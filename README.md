# k1lib-bootstrap

Bootstrap 5 components built on [k1lib.html](https://github.com/klan1/k1lib.html)

## Requirements

- k1lib.html
- PHP 8.2+

## Installation

```sh
composer require klan1/k1lib-bootstrap
```

## Development with Opencode

This project uses [opencode](https://opencode.ai) as the AI-assisted development tool.

### Session Management

Opencode sessions capture the full development context (conversations, file changes, tool calls). For continuity across machines:

**Export session:**
```sh
opencode session list                                    # List available sessions
opencode export <session-id> > session-export.json      # Export to JSON
```

**Import and continue:**
```sh
opencode import session-export.json                     # Import session
opencode --continue                                    # Resume the session
```

### Typical Workflow

1. Clone the repository
2. Run `composer install`
3. Start opencode: `opencode` or `opencode .`
4. Make changes and commit regularly
5. Before switching machines, export the session
6. On the new machine, import and continue with `--continue`

## License

Apache License Version 2.0