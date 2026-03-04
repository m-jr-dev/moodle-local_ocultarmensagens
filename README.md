# Ocultar Mensagens (local_ocultarmensagens)

Oculta elementos da interface de mensagens do Moodle enquanto o usuário tiver uma tentativa de quiz **em andamento** (`quiz_attempts.state = 'inprogress'`).

Durante a tentativa em andamento, o plugin:

- Oculta o popover de mensagens e botões relacionados (UI)
- Redireciona acessos a páginas que começam com `/message/` para `/my/`, evitando que o usuário abra a área de mensagens durante o quiz

---

## Requirements

- Moodle 5.0+.

---

## Installation

1. Copie esta pasta para: `local/ocultarmensagens`
2. Acesse **Administração do site → Notificações**

---

## Features

- Detecção automática de tentativa de quiz em andamento para o usuário logado
- Ao detectar tentativa em andamento:
  - Redireciona URLs locais iniciadas com `/message/` para `/my/`
  - Carrega o módulo AMD `local_ocultarmensagens/hidemessages` para ocultar elementos via DOM
  - Carrega `styles.css` para ocultar elementos (dependente do seletor/tema)

Elementos ocultados (theme/page dependent):

- `div.popover-region[data-region='popover-region-messages']`
- `a#message-user-button`
- `.btn-group.header-button-group.mx-3`

---

## Configuration

Não há página de configuração.

O comportamento é aplicado automaticamente para usuários logados (não guest) quando há tentativa de quiz em andamento.

---

## Capabilities

O plugin define a capability abaixo em `db/access.php`, porém **não realiza checagem dessa capability no fluxo atual**:

- `local/ocultarmensagens:viewmessages` — Definida em contexto de sistema (arquetipo `user` permitido)

---

## Data and Privacy (GDPR)

Não cria tabelas próprias e não grava preferências.

### Privacy API

Implements:

- `\core_privacy\local\metadata\null_provider`