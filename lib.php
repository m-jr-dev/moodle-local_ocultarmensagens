<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Callback para modificar a página antes do HTML padrão ser enviado.
 *
 * Se o usuário atual tiver tentativa de quiz em andamento, redireciona acesso à página de mensagens
 * para o dashboard e carrega JS e CSS para esconder elementos de mensagens.
 *
 * @package    local_ocultarmensagens
 * @copyright  2025 Marcelo M. Almeida Jr.
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @return     void
 */

/**
 * Callback para modificar a página antes do HTML padrão ser enviado.
 *
 * Se o usuário atual tiver tentativa de quiz em andamento, redireciona acesso à página de mensagens
 * para o dashboard e carrega JS e CSS para esconder elementos de mensagens.
 *
 * @package    local_ocultarmensagens
 * @return     void
 */
function local_ocultarmensagens_before_standard_html_head() {
    global $USER, $DB, $PAGE;

    // Ignora se o usuário não está logado ou é convidado.
    if (!isloggedin() || isguestuser()) {
        return;
    }

    // Verifica se o usuário possui alguma tentativa de quiz em andamento.
    $hasinprogress = $DB->record_exists('quiz_attempts', [
        'userid' => $USER->id,
        'state' => 'inprogress',
    ]);

    if ($hasinprogress) {
        // Redireciona URLs /message/ para /my/ para evitar uso de mensagens durante o quiz.
        $currenturl = $PAGE->url->out_as_local_url(false);
        if (strpos($currenturl, '/message/') === 0) {
            redirect(new moodle_url('/my/'));
        }

        // Chama módulo AMD JavaScript para esconder elementos de mensagens.
        $PAGE->requires->js_call_amd('local_ocultarmensagens/hidemessages', 'init');

        // Chama CSS para esconder elementos de mensagens.
        $PAGE->requires->css(new moodle_url('/local/ocultarmensagens/styles.css'));
    }
}
