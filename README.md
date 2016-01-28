これは機械学習のための単純パーセプトロンのプログラムになります。
### 環境について
- PHP 5.4以上
- Composer
- PHPUnit

### 使い方
#### Composerのインストール
```bash
$ composer self-update
$ composer install
```

#### PHPUnitのインストール
```bash
$ composer install
```

#### 判定の実行
アプリケーションのドキュメントルートで以下のコマンドを実行してください。
```bash
$ php src/simple_perceptron.php
```

#### テストの実行
```bash
$ cd test/
$ ../vendor/bin/phpunit  // --color=auto --testdox-textなどのオプションは適宜付与
```

※もしテスト実行速度が遅いと感じる場合は、`phpunit`のバージョンを`4.6.3`に変更してください。

### ラインセンス
ライセンスは「[MIT License](https://github.com/k-kuwahara/simple_perceptron/blob/master/LICENSE.md)」です。

### その他
コードレビュー、ご意見をいつでもお待ちしております！
