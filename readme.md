# Практическое задание


Необходимо написать модуль, который позволит прочитать таблицу из csv файла.


* Код реализации модуля должен быть понятным, оформлен согласно современным стандартам, написан на php 8 и опубликован на github или gitlab.
* Реализовать модуль необходимо без использования фреймворков.
* Таблицы предполагается читать достаточно большие (загрузка в память всей таблицы может привести к снижению производительности или отказу системы).
* Заголовки в таблицах будут располагаться на первой строке. Идентификаторы строк (кроме строки заголовка) будут располагаться в первом столбце.
* Модуль не должен возвращать дублирующие строки из таблиц.
* Оцениваться будет понятность кода, использование подходящих конструкция языка, стандартизированность.


* [cli скрипты по работе с генерацией и чтением csv](/cli)
* [настройки генератора csv файла](/src/csv/Fixture/fixture_settings.json)

Внутри проекта есть [csv файл пример](/cli) сгениророванный заранее [модулем](src/csv/Fixture/FixtureGenerator.php) . Его можно прочитать
через [скрипт](/cli/read_csv.php). Вывод скрипта идет в stdout.
Для решения задачи использовались 
1. PSR-4
2. DTO шаблок проектирования
3. PSR-12
4. Генераторы (предусмотрена возможность построчного чтения файлов)
