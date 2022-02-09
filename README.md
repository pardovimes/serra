# Installation

Install with composer:
```bash
$ composer require pardovimes/serra
```

# Usage

```bash
php  <path to serra file> [-f <file>] [-c <config.json>]
```

Example
```bash
php  vendor/pardovimes/serra/src/serra
```

Options

* `-f <file>` execute script only for this file
* `-c <json.file>` execute script with this configuration

Configuration options
-

Example
```json
{
  "folder-to-scan": "src/",
  "domain-folder-name": "Domain",
  "application-folder-name": "Application",
  "domain-valid-uses": [
    "Webmozart\\Assert\\Assert"
  ],
  "application-valid-uses": [
    "Webmozart\\Assert\\Assert"
  ]
}
```

Options

* `folder-to-scan` if file is not passed it scans all files from folder. `src/` by default.
* `domain-folder-name` Domain layer name. `Domain` by default.
* `application-folder-name` Application layer name. `Application` by default.
* `domain-valid-uses` Array of packages that will ignore if found on domain layer. empty array by default 
* `application-valid-uses` Array of packages that will ignore if found on application layer. empty array by default

# License

Composer is licensed under the GNU GPLv3 License - see the [LICENSE](LICENSE) file for details.
