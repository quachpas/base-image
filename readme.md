# Base image for Firefly III

This is the base image for Firefly III. It runs in an Azure pipeline.

It runs from `Dockerfile-cli.original` and `Dockerfile-web.original` in which a few vars are being replaced and saved into `Dockerfile.cli` and `Dockerfile.web` respectively.

It copies a few scripts into `serversideup/php:8.4-fpm-nginx`.

It expects `entrypoint.sh` to be copied into the image when Firefly III and the Data Importer are built.