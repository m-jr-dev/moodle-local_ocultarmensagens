/**
 * Oculta a área popover de mensagens e botões relacionados, se existirem.
 *
 * @module     local_ocultarmensagens/hidemessages
 * @copyright  2025 Marcelo M. Almeida Júnior
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
define([], function() {
    return {
        /**
         * Função de inicialização chamada automaticamente pelo Moodle.
         */
        init: function() {
            // console.log('local_ocultarmensagens/hidemessages module loaded');

            // Oculta o popover de mensagens.
            var selector = "div.popover-region[data-region='popover-region-messages']";
            var el = document.querySelector(selector);
            if (el) {
                el.style.display = 'none';
                // console.log('Messages popover hidden.');
            }

            // Oculta o botão "mensagem para usuário".
            var userbtn = document.querySelector('a#message-user-button');
            if (userbtn) {
                userbtn.style.display = 'none';
                // console.log('User message button hidden.');
            }

            // Oculta o grupo de botões da barra superior.
            var btnGroup = document.querySelector('.btn-group.header-button-group.mx-3');
            if (btnGroup) {
                btnGroup.style.display = 'none';
                // console.log('Header button group hidden.');
            }
        }
    };
});
