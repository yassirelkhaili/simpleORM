# Programmation Orientée Objet (POO) en PHP

## Definition
```plaintext
La programmation orientée objet (POO) est un paradigme de programmation qui repose sur le concept d'objets, des entités qui regroupent des données et des méthodes qui agissent sur ces données. En PHP, la POO est largement supportée, permettant aux développeurs de structurer leur code de manière plus modulaire et réutilisable.
```

## Création de Classes et d'Objets en PHP

```plaintext
**Classes** : Une classe est un modèle ou un plan pour créer des objets. Elle définit les propriétés (attributs) et les méthodes (fonctions) qui caractérisent les objets créés à partir de cette classe.
```

```php
class MaClasse {
    // Propriétés (attributs)
    public $propriete1;
    private $propriete2;
    
    // Méthodes
    public function methode1() {
        // Code de la méthode
    }
    
    private function methode2() {
        // Code de la méthode
    }
}
```

```plaintext
**Objets** : Un objet est une instance d'une classe. On crée un objet en instanciant une classe.
```

```php
$monObjet = new MaClasse();
```

## Encapsulation et Modificateurs d'Accès :

### Definition

```plaintext
L'encapsulation est le concept qui consiste à regrouper les données (attributs) et les méthodes qui opèrent sur ces données dans une même unité, la classe. Les modificateurs d'accès (public, private, et protected) définissent la visibilité des propriétés et des méthodes au sein de la classe et en dehors.
```

```plaintext
**Public** : Les propriétés et méthodes sont accessibles depuis n'importe où.
```

```php
class Exemple {
    public $publicProp;
    
    public function publicMethod() {
        // Code
    }
}
```

```plaintext
**Private** : Les propriétés et méthodes sont uniquement accessibles à l'intérieur de la classe.
```

```php
class Exemple {
    private $privateProp;
    
    private function privateMethod() {
        // Code
    }
}
```

```plaintext
**Protected** : Les membres protégés sont accessibles depuis la classe elle-même et ses classes dérivées (héritage).
```

```php
class Exemple {
    protected $protectedVar = "Accessible dans la classe et ses classes dérivées";
}
```

## Héritage et Polymorphisme

```plaitext
**Héritage** : Il permet à une classe (classe dérivée) d'hériter des propriétés et des méthodes d'une autre classe (classe de base).
```

```php
class Animal {
    public function manger() {
        echo "L'animal mange";
    }
}

class Chien extends Animal {
    // Cette classe hérite de la méthode manger
}
```

```plaintext
**Polymorphisme** : Il permet à une classe de fournir une implémentation spécifique d'une méthode héritée.
```

```php
class Animal {
    public function faireDuBruit() {
        echo "Le bruit de l'animal";
    }
}

class Chien extends Animal {
    public function faireDuBruit() {
        echo "Aboyer";
    }
}

class Chat extends Animal {
    public function faireDuBruit() {
        echo "Miauler";
    }
}
```

## Interfaces et Traits

```plaintext
**Interfaces** : Les interfaces définissent des contrats que les classes doivent suivre. Elles déclarent les méthodes qu'une classe doit implémenter, mais n'implémentent pas elles-mêmes le code. Une classe peut implémenter plusieurs interfaces.
```

```php
interface Logger {
    public function log($message);
}

class FileLogger implements Logger {
    public function log($message) {
        // Implémentation de la méthode log pour FileLogger
    }
}
```

```plaintext
**Traits** : Les traits sont des mécanismes de réutilisation de code horizontale. Ils permettent d'inclure des méthodes dans une classe sans utiliser l'héritage. Une classe peut utiliser plusieurs traits.
```

```php
trait LogTrait {
    public function log($message) {
        // Implémentation de la méthode log pour le trait
    }
}

class FileLogger {
    use LogTrait;
}

```

## Namespaces et Autoloading

```plaintext
**Namespaces** : Les espaces de noms permettent d'organiser le code en groupant des classes, interfaces, fonctions, etc. sous un nom spécifique.
```

```php
namespace MonProjet;

class MaClasse {
    // ...
}
```

```plaintext
**Autoloading** : L'autoloading permet de charger automatiquement les classes sans avoir besoin de les inclure manuellement. L'utilisation d'une fonction d'autoloading comme spl_autoload_register est courante.
```

```php
// Exemple d'autoloading avec une fonction anonyme
spl_autoload_register(function ($class) {
    include 'chemin/vers/' . $class . '.php';
});
```

## Méthodes Magiques

```plaintext
**Les méthodes magiques** sont des méthodes spéciales avec des noms prédéfinis, commençant généralement par deux caractères de soulignement. Elles permettent d'intercepter des appels de méthodes spécifiques et d'implémenter des comportements personnalisés.
```

### __get

```php
class Exemple {
    private $donnees = array();

    public function __get($propriete) {
        if (isset($this->donnees[$propriete])) {
            return $this->donnees[$propriete];
        } else {
            return null;
        }
    }
}
```

### __set

```php
class Exemple {
    private $donnees = array();

    public function __set($propriete, $valeur) {
        $this->donnees[$propriete] = $valeur;
    }
}
```

###
