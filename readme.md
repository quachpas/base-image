# Base image for Firefly III

[![Packagist](https://img.shields.io/packagist/v/grumpydictator/firefly-iii.svg?style=flat-square)](https://packagist.org/packages/grumpydictator/firefly-iii) 
[![License](https://img.shields.io/github/license/firefly-iii/firefly-iii.svg?style=flat-square])](https://www.gnu.org/licenses/agpl-3.0.html) 
[![Donate using GitHub](https://img.shields.io/badge/donate-GitHub-green?logo=github&style=flat-square)](https://github.com/sponsors/JC5)
[![Docker Stars](https://img.shields.io/docker/stars/fireflyiii/core?style=flat-square)](https://hub.docker.com/r/fireflyiii/core)
[![Docker Pulls](https://img.shields.io/docker/pulls/fireflyiii/core?style=flat-square)](https://hub.docker.com/r/fireflyiii/core)

<!-- PROJECT LOGO -->
<br />
<p align="center">
  <a href="https://firefly-iii.org/">
    <img src="https://raw.githubusercontent.com/firefly-iii/firefly-iii/develop/.github/assets/img/logo-small.png" alt="Firefly III" width="120" height="178">
  </a>
</p>
  <h1 align="center">Firefly III</h1>

  <p align="center">
    A free and open source personal finance manager
    <br />
  </p>
<!--- END PROJECT LOGO -->

This is the repository that holds the "base" images for Firefly III and the Firefly III Data Importer. Both tools need this base image to run correctly. The Dockerfiles for this base image is stored and built on GitHub.

There are two variants of the base image, and they both come in two labels.

## Base image (web version)

The web version of the base image is built from `serversideup/php:8.4-fpm-nginx`. In [Dockerfile-web.original](https://github.com/firefly-iii/base-image/blob/main/Dockerfile-web.original) you can see that the base image adds some scripts and installs some PHP extensions.

## Base image (CLI version)

The CLI version of the base image is built from `serversideup/php:8.4-cli`. In [Dockerfile-cli.original](https://github.com/firefly-iii/base-image/blob/main/Dockerfile-cli.original) you can see a similar process as the web version. Scripts are added and PHP extensions are installed.

## Build process

`Dockerfile-cli.original` and `Dockerfile-web.original` are converted into `Dockerfile.cli` and `Dockerfile.web` respectively. This is not just because these are two different images, but also because the Dockerfile contains labels which are updated dynamically before each run. You can see the text `%BASE_IMAGE_BUILD_NO%` in the original files, which is replaced with the actual build number in the resulting Dockerfile.

Adding the build number to the build this way helps me debug issues. When Firefly III (or the data importer) starts, it reports both the build number of the base image as the build number of the container itself.

## CLI versus web

The CLI version of the Docker container is only used by the data importer. It will not start a web server (nor does it have the necessary code) and is used to import data over the command line.

<!-- HELP TEXT -->

## Do you need help, or do you want to get in touch?

Do you want to contact me? You can email me at [james@firefly-iii.org](mailto:james@firefly-iii.org) or get in touch through one of the following support channels:

- [GitHub Discussions](https://github.com/firefly-iii/firefly-iii/discussions/) for questions and support
- [Gitter.im](https://gitter.im/firefly-iii/firefly-iii) for a good chat and a quick answer
- [GitHub Issues](https://github.com/firefly-iii/firefly-iii/issues) for bugs and issues
- <a rel="me" href="https://fosstodon.org/@ff3">Mastodon</a> for news and updates

<!-- END OF HELP TEXT -->

<!-- SPONSOR TEXT -->

## Support the development of Firefly III

If you like Firefly III and if it helps you save lots of money, why not send me a dime for every dollar saved! 🥳

OK that was a joke. If you feel Firefly III made your life better, please consider contributing as a sponsor. Please check out my [Patreon](https://www.patreon.com/jc5) and [GitHub Sponsors](https://github.com/sponsors/JC5) page for more information. You can also [buy me a ☕️ coffee at ko-fi.com](https://ko-fi.com/Q5Q5R4SH1). Thank you for your consideration.

<!-- END OF SPONSOR TEXT -->


