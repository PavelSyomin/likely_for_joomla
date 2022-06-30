# Likely for Joomla

Plugin of [Likely social sharing buttons](https://ilyabirman.net/likely/) for Joomla.

## Features

* Two themes: regular and dark.
* Three sizes: small, medium and big.
* 10 social networks, services or messengers: Twitter, Facebook, LinkedIn, Reddit, Vkontakte, Odnoklassniki, WhatsApp, Viber, Telegram, Pinterest.
* Counters on buttons.
* Accessibility markup.
* Easy customization.
* Async loading = do not block page rendering.

## Quick Start

1. Download the latest version of plugin on [releases page](https://github.com/PavelSyomin/likely_for_joomla/releases).
2. Go to System → Install → Extensions in admin area of your Joomla website and upload the installation file.
3. Go to System → Plugins, search by keyword “Likely” and enable the plugin.

Plugin appears at the bottom of each page created with default Joomla content component. Other components for content management are not supported. If you want me to add support for them, feel free to [open an issue](https://github.com/PavelSyomin/likely_for_joomla/issues/new).

## Settings

Settings consist of Plugin tab and 10 tabs for each button. Options are self-explanatory, and every option has description, so I think there will be no problems with customization.

Plugin options include selection of theme and size of the buttons, as well as turning on/off the counters on buttons.

Options for each button are to show or hide it, to set text on a button and to define its order.

## Snippets

When one shares a page in a social network or a messenger, a snippet is usually formed which includes page title, intro image, URL, description, etc. Data for this snippet is obtained in two ways: either the social network or a messenger parses the site directly or it uses special [OpenGraph tags](https://ogp.me/) which can be placed on a page. This plugin adds only buttons and does not provide for a OpenGraph tags. There are a few extensions capable of setting necessary OpenGraph tags, so if you need, you may find one of them in JED.

If you think that this plugin should have an option to add OpenGraph tags so a website administrator will not have to install extra extensions, please open an issue, and I will think about adding this feature.

[То же самое по-русски](README_RU.md)
