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

namespace local_ocultarmensagens;

/**
 * Observers para os eventos do plugin local_ocultarmensagens.
 *
 * @package    local_ocultarmensagens
 * @copyright  2025 Marcelo M. Almeida Jr.
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class observer {

    /**
     * Evento: tentativa de quiz iniciada.
     *
     * @param \mod_quiz\event\attempt_started $event
     * @return void
     */
    public static function quiz_attempt_started(\mod_quiz\event\attempt_started $event): void {
        // Nenhuma ação definida no momento.
    }

    /**
     * Evento: tentativa de quiz enviada.
     *
     * @param \mod_quiz\event\attempt_submitted $event
     * @return void
     */
    public static function quiz_attempt_submitted(\mod_quiz\event\attempt_submitted $event): void {
        // Nenhuma ação definida no momento.
    }
}
