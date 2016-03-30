# rgb颜色和16进制互转

php提供了十进制和十六进制互相转换的函数，分别是：dechex()和hexdec()。

比如：

```php
$r = 127;
$g = 0;
$b = 33;

$r2 = dechex($r);
$g2 = dechex($g);
$b2 = dechex($b);

var_dump($r2, $g2, $b2);
// string(2) "7f" string(1) "0" string(2) "21"
```

所以只要转换的时候注意一下数值大小就可以。

PS：index.php文件是较早的，其中使用的方法偏复杂，仅供参考。
