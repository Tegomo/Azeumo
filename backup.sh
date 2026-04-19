#!/bin/bash
# Backup base de données Azeumo
mkdir -p backups
FILENAME="azeumo_$(date +%Y%m%d_%H%M%S).sql"
docker run --rm \
  --network dokploy-network \
  -v "$(pwd)/backups:/backup" \
  mysql:8.0 \
  mysqldump -h 172.25.0.1 -P 3306 -u azeumo -pazeumo2026! azeumo \
  > backups/$FILENAME && \
gzip backups/$FILENAME && \
echo "Backup OK: backups/$FILENAME.gz"
