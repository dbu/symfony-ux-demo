# Symfony UX Hotwire Demo

This is a demo for the Symfony UX integration with [Hotwire](https://hotwired.dev/).

It is based on [Symfony Docker](https://github.com/dunglas/symfony-docker/) by Kevin Dunglas et al.
It uses [Docker](https://www.docker.com/) to run the [Symfony](https://symfony.com) web framework
with [FrankenPHP](https://frankenphp.dev) and [Caddy](https://caddyserver.com/).

## Getting Started

1. If not already done, [install Docker Compose](https://docs.docker.com/compose/install/) (v2.10+)
2. Run `make rebuild` to build fresh images
3. Run `make up` to launch the demo
4. Open `https://localhost` in your favorite web browser and [accept the auto-generated TLS certificate](https://stackoverflow.com/a/15076602/1352334)
5. Run `make down` to stop the Docker containers.

## Features

* Demonstrate the effect of Turbo Drive (with an artificially slowed controller to see the difference);
* Demo for Turbo Frames;
* Demo for Turbo Streams;
* Demo for using raw SSE with Stimulus.

## Docs from upstream

1. [Options available](https://github.com/dunglas/symfony-docker/tree/main/docs/options.md)
2. [Using Symfony Docker with an existing project](https://github.com/dunglas/symfony-docker/tree/main/docs/existing-project.md)
3. [Support for extra services](https://github.com/dunglas/symfony-docker/tree/main/docs/extra-services.md)
4. [Deploying in production](https://github.com/dunglas/symfony-docker/tree/main/docs/production.md)
5. [Debugging with Xdebug](https://github.com/dunglas/symfony-docker/tree/main/docs/xdebug.md)
6. [TLS Certificates](https://github.com/dunglas/symfony-docker/tree/main/docs/tls.md)
7. [Using MySQL instead of PostgreSQL](https://github.com/dunglas/symfony-docker/tree/main/docs/mysql.md)
8. [Using Alpine Linux instead of Debian](https://github.com/dunglas/symfony-docker/tree/main/docs/alpine.md)
9. [Using a Makefile](https://github.com/dunglas/symfony-docker/tree/main/docs/makefile.md)
10. [Updating the template](https://github.com/dunglas/symfony-docker/tree/main/docs/updating.md)
11. [Troubleshooting](https://github.com/dunglas/symfony-docker/tree/main/docs/troubleshooting.md)
12. [Using AI Coding Agents](https://github.com/dunglas/symfony-docker/tree/main/docs/agents.md)

## License

The Symfony UX demo is available under the MIT License.

## Credits

The Symfony UX demo was created by David Buchmann for [Symfony Live Berlin 2026](https://live.symfony.com/2026-berlin/).

### Symfony-Docker

This demo is built on Symfony-Docker created by [Kévin Dunglas](https://dunglas.dev), co-maintained by [Maxime Helias](https://twitter.com/maxhelias) and sponsored by [Les-Tilleuls.coop](https://les-tilleuls.coop).
