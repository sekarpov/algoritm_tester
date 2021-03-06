# Алгоритм нахождения НОД (наибольший общий делитель)

Алгоритм **Евклида**

```php
while ($a != $b)
{
    if ($a > $b) {
        $a = $a - $b;
    } else {
        $b = $b - $a;
    }
}
return $b;
```
У этого алгоритма сложность *n*. 
Например вычислить НОД чисел 125 и 15 не проблема. Но если на вход подать 1234567890 и 2 программа будет выполняться очень долго. Это проблема.

####Есть модификация алгоритма **Eвклида**.

Вместо вычитания использовать остаток от деления.

```php
while ($a != 0 && $b != 0)
{
    if ($a > $b) {
        $a = $a % $b;
    } else {
        $b = $b % $a;
    }
}

if($b == 0) return $a;

return $b;
```

У этого алгоритма сложность *O(h^2)* или *O((lgn)^2)*. 

####Тк сама операция %(остаток от деления сложная), есть спрособ более быстрый. Алгоритм **Eвклида** можно вычислить выполняя битовые операции.

https://en.wikipedia.org/wiki/Binary_GCD_algorithm


