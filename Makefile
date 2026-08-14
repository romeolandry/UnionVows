.PHONY: start-claude-code help validate-env

ifneq ($(wildcard .env),)
ANTHROPIC_BASE_URL ?= $(shell sed -n 's/^ANTHROPIC_BASE_URL=//p' .env | head -n 1 | tr -d '"')
CLAUDE_MODEL ?= $(shell sed -n 's/^CLAUDE_MODEL=//p' .env | head -n 1 | tr -d '"')
else
ANTHROPIC_BASE_URL ?= https://ai-operator.kcrl-devops.de/ollama
CLAUDE_MODEL ?= gemma4:e4b
endif

validate-env:
	@if [ -f .env ]; then \
		for var in ANTHROPIC_BASE_URL CLAUDE_MODEL; do \
			if ! grep -Eq "^$$var=" .env; then \
				echo "ERROR: Missing $$var in .env"; \
				exit 1; \
			fi; \
		done; \
	fi

help:
	@echo "Usage: make <target> [VAR=value]"
	@echo ""
	@echo "Targets:"
	@echo "  start-claude-code  Start claude-code using the configured Ollama endpoint"
	@echo ""
	@echo "Defaults:"
	@echo "  .env overrides the values below when present"
	@echo "  ANTHROPIC_BASE_URL  $(ANTHROPIC_BASE_URL)"
	@echo "  CLAUDE_MODEL       $(CLAUDE_MODEL)"
	@echo ""
	@echo "Examples:"
	@echo "  make start-claude-code"
	@echo "  make start-claude-code CLAUDE_MODEL=entropic_server"
	@echo "  make start-claude-code ANTHROPIC_BASE_URL=https://ollama.kcrl-devops.de CLAUDE_MODEL=entropic_server"

start-claude-code: validate-env
	@set -a; [ -f .env ] && . ./.env; set +a; \
	export ANTHROPIC_BASE_URL="$${ANTHROPIC_BASE_URL:-$(ANTHROPIC_BASE_URL)}"; \
	claude-code --model "$${CLAUDE_MODEL:-$(CLAUDE_MODEL)}"
