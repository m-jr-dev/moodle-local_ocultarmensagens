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
 * Allows plugins to add any elements to the header.
 *
 * @package    local_ocultarmensagens
 * @copyright  2026 Marcelo M. Almeida Jr.
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class hook_callbacks {
    /**
     * Callback to add head elements.
     *
     * @param \core\hook\output\before_standard_head_html_generation $hook
     */
    public static function before_standard_head_html_generation(
        \core\hook\output\before_standard_head_html_generation $hook,
    ): void {
        global $USER, $DB, $PAGE;

        // Ignore if the user is not logged in or is a guest.
        if (!isloggedin() || isguestuser()) {
            return;
        }

        // Check if the user has any quiz attempt currently in progress.
        $hasinprogress = $DB->record_exists('quiz_attempts', [
            'userid' => $USER->id,
            'state' => 'inprogress',
        ]);

        if ($hasinprogress) {
            // Redirect URLs starting with /message/ to /my/ to prevent messaging during the quiz.
            $currenturl = $PAGE->url->out_as_local_url(false);
            if (strpos($currenturl, '/message/') === 0) {
                redirect(new \moodle_url('/my/'));
            }

            // Calls the AMD JavaScript module to hide messaging elements.
            $PAGE->requires->js_call_amd('local_ocultarmensagens/hidemessages', 'init');

            // Loads CSS to hide messaging elements.
            $PAGE->requires->css(new \moodle_url('/local/ocultarmensagens/styles.css'));
        }
    }
}
