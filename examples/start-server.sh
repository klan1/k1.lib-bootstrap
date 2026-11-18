#!/usr/bin/env bash

# Convenience launcher for the k1.lib-bootstrap examples showcase.
#
# Usage:
#   ./examples/start-server.sh          # uses the default port (8200)
#   PORT=9000 ./examples/start-server.sh

PORT="${PORT:-6200}"

cd "$(dirname "$0")"

exec php -S "0.0.0.0:${PORT}" -t . router.php
