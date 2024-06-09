<?php

class NoweAuto
{
    protected $model = "";
    protected $cenaWEuro = 0.0;
    protected static $kursEuroPLN = 4.5;

    public function __construct($model, $cenaWEuro, $kursEuroPLN)
    {
        $this->model = $model;
        $this->cenaWEuro = $cenaWEuro;
        self::$kursEuroPLN = $kursEuroPLN;
    }

    public function ObliczCene(): float
    {
        return $this->cenaWEuro * self::$kursEuroPLN;
    }

    public function __toString()
    {
        return "Model: $this->model, Cena w Euro: $this->cenaWEuro, Kurs Euro do PLN: " . self::$kursEuroPLN;
    }
}

class AutoZDodatkami extends NoweAuto
{
    private $alarm = 0.0;
    private $radio = 0.0;
    private $klimatyzacja = 0.0;

    public function __construct($model, $cenaWEuro, $kursEuroPLN, $alarm, $radio, $klimatyzacja)
    {
        parent::__construct($model, $cenaWEuro, $kursEuroPLN);
        $this->alarm = $alarm;
        $this->radio = $radio;
        $this->klimatyzacja = $klimatyzacja;
    }

    public function ObliczCene(): float
    {
        return parent::ObliczCene() + $this->alarm + $this->radio + $this->klimatyzacja;
    }

    public function __toString()
    {
        return parent::__toString() . ", Alarm: $this->alarm, Radio: $this->radio, Klimatyzacja: $this->klimatyzacja";
    }
}

class Ubezpieczenie extends AutoZDodatkami
{
    private $procentUbezpieczenia = 0.0;
    private $lataPosiadania = 0.0;

    public function __construct($model, $cenaWEuro, $kursEuroPLN, $alarm, $radio, $klimatyzacja, $procentUbezpieczenia, $lataPosiadania)
    {
        parent::__construct($model, $cenaWEuro, $kursEuroPLN, $alarm, $radio, $klimatyzacja);
        $this->procentUbezpieczenia = $procentUbezpieczenia;
        $this->lataPosiadania = $lataPosiadania;
    }

    public function ObliczCene(): float
    {
        return $this->procentUbezpieczenia * (parent::ObliczCene() * ((100 - $this->lataPosiadania) / 100));
    }

    public function __toString()
    {
        return parent::__toString() . ", Procent Ubezpieczenia: $this->procentUbezpieczenia, Lata Posiadania: $this->lataPosiadania";
    }
}

//przykladowe uzycie dla obiektu klasy NoweAuto, z wypisaniem wszystkich danych
$auto = new NoweAuto('Audi A6', 15000, 4.5);
echo $auto->__toString();
echo "<br>";
echo "Cena samochodu:";
echo $auto->ObliczCene();
echo "<br>";

//przykladowe uzycie dla obiektu klasy AutoZDodatkami
$auto2 = new AutoZDodatkami('Audi A4', 10000, 4.5, 1000, 500, 2000);
echo $auto2->__toString();
echo "<br>";
echo "Cena samochodu z dodatkami:";
echo $auto2->ObliczCene();
echo "<br>";

//przykladowe uzycie dla obiektu klasy Ubezpieczenie
$auto3 = new Ubezpieczenie('BMW X5', 20000, 4.5, 1250, 675, 3275, 0.1, 5);
echo $auto3->__toString();
echo "<br>";
echo "Cena ubezpieczenia:";
echo $auto3->ObliczCene();
echo "<br>";

//przykladowe uzycie dla dla obiektu klasy Ubezpieczenie
$auto4 = new Ubezpieczenie('Mercedes S500', 30000, 4.5, 1000, 500, 2000, 0.2, 10);
echo $auto4->__toString();
echo "<br>";
echo "Cena ubezpieczenia:";
echo $auto4->ObliczCene();
echo "<br>";
?>

