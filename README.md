This program is the simple perceptron for machine learning.

### Execution environment
- PHP over 5.4
- Composer
- PHPUnit over 4.6.3

### How to use

#### Install PHPUnit
```bash
$ composer self-update
$ composer install
```

#### Run this program
Please execute the following command in the application's document root.

```bash
$ php src/simple_perceptron.php
```

#### Run unit test
```bash
$ cd test/
$ ../vendor/bin/phpunit  # If you need, add options such as --color=auto --testdox-text
```

※If you feel that the unit test speed is slow, change version of `PHPUnit` to `4.6.3`.

### License
It is 「[MIT License](https://github.com/k-kuwahara/simple_perceptron/blob/master/LICENSE.md)」.

### Other
Welcome your code review and comments at any time!
