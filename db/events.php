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
 * Mapeamento de eventos para o plugin local_ocultarmensagens.
 *
 * @package    local_ocultarmensagens
 * @copyright  2025 Marcelo M. Almeida Jr.
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

// Mapeia os eventos do quiz para os métodos do observer.
$observers = [
    // Quando uma tentativa de quiz é iniciada.
    [
        'eventname' => '\\mod_quiz\\event\\attempt_started',
        'callback'  => 'local_ocultarmensagens_observer::quiz_attempt_started',
    ],
    // Quando uma tentativa de quiz é finalizada.
    [
        'eventname' => '\\mod_quiz\\event\\attempt_submitted',
        'callback'  => 'local_ocultarmensagens_observer::quiz_attempt_submitted',
    ],
];
