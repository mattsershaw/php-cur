Lesson 13について

php-curriculumディレクトリで

$ composer create-project --prefer-dist cakephp/app:3.8.* .

上記コマンドでappディレクトリを作成後、app/src/Controller内に

LargeAreaController.php
CityController.php

を中心に作成。Lesson 12の課題で作成した

・large_area
・city

の2つのDBを利用。ログイン機能はなく
localhost:8080/largearea
からアクセス可能。チェックする場合は
私のリポジトリのlesson12内にある
lesson12.sqlファイルをインポートし、
同じくlesson12内にあるindex.phpを一度実行してからチェックの方お願いいたします。
