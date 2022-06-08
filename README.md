## Инструменты для анализа и рефакторинга кодовой базы приложения

Для удобства работы с инструментами для анализа и рефакторинга кода создан репозиторий [curse89/linters-package](https://github.com/curse89/linters-package/).

Для установки пакета в автоматическом режиме необходимо указать в файле composer.json приложения:
- в секции **"repositories"** для установки пакета:
<pre>
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/curse89/linters-package.git"
    }
]
</pre>
- в секции **"extra"** для автоматизации копирования файлов конфигураций инструментов в корень проекта:
<pre>
"extra": {
    "compile-mode": "whitelist",
    "compile-whitelist": ["curse89/linters-package"]
}
</pre>

В процессе установки пакета необходимо разрешить пакетам **"phpro/grumphp"**, **"civicrm/composer-compile-plugin"** вносить изменения в код, в результате чего секция **"config"** в <code>composer.json</code> примет следующий вид:
<pre>
"config": {
    "allow-plugins": {
        "phpro/grumphp": true,
        "civicrm/composer-compile-plugin": true
    }
}
</pre>

Для корректной работы GrumPHP с приложением, собранном в docker-контейнере, в конфигурации по-умолчанию задана следующая команда запуска:
<pre>
    EXEC_GRUMPHP_COMMAND: docker-compose run --rm --no-deps app php
</pre>
В команду необходимо будет внести корректировки, если процесс запуска контейнера с приложением отличается от указанного. После внесения изменений в контейнере требуется выполнить команду <code>./vendor/bin/grumphp git:init</code>.

После выполнения вышеописанных действий в процессе выполнения команды <code>git commit</code> будет проведен анализ кода в файлах, находящихся в отслеживаемой зоне, следующими инструментами:
- phpcs;
- php-cs-fixer;
- phpmd;
- phpstan.

Для того, чтобы выполнить commit без проверки кода, необходимо ввести команду:
<pre>git commit -m "some_text" --no-verify</pre>
