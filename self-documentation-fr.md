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

```plaintext
Appelé lors de l’accès à une propriété inaccessible.
```

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

```plaintext
Appelé lorsqu'une propriété inaccessible est modifiée.
```

```php
class Exemple {
    private $donnees = array();

    public function __set($propriete, $valeur) {
        $this->donnees[$propriete] = $valeur;
    }
}
```

### __isset

```plaintext
Appelé lorsque isset() ou empty() est utilisé sur une propriété inaccessible.
```

```php
class Example {
    private $data = array();

    public function __isset($property) {
        return isset($this->data[$property]);
    }
}
```

### __unset

```plaintext
Appelé lorsque unset() est utilisé sur une propriété inaccessible.
```

```php
class Example {
    private $data = array();

    public function __unset($property) {
        unset($this->data[$property]);
    }
}
```

### __toString

```plaintext
Appelé lorsqu'un objet est traité comme une chaîne.
```

```php
class Example {
    public function __toString() {
        return "This is the string representation of the object.";
    }
}

$myObject = new Example();
echo $myObject; // Outputs: This is the string representation of the object.
```

### __call

```plaintext
Appelé lorsqu'une méthode inaccessible est invoquée.
```

```php
class Example {
    public function __call($method, $arguments) {
        echo "Calling method $method with arguments: " . implode(', ', $arguments);
    }
}

$myObject = new Example();
$myObject->exampleMethod(1, 2, 3);
// Outputs: Calling method exampleMethod with arguments: 1, 2, 3
```

### __callStatic

```plaintext
Appelé lorsqu'une méthode statique inaccessible est invoquée.
```

```php
class Example {
    public static function __callStatic($method, $arguments) {
        echo "Calling static method $method with arguments: " . implode(', ', $arguments);
    }
}

Example::exampleStaticMethod(4, 5, 6);
// Outputs: Calling static method exampleStaticMethod with arguments: 4, 5, 6
```

### __contruct

```plaintext
Méthode **Constructeur** appelée lors de la création d'un objet.
```

```php
class MyClass {
    public function __construct() {
        echo "Object created!";
    }
}

$obj = new MyClass();  // Outputs: Object created!
```

### __destruct

```plaintext
Méthode **Destructor** appelée lorsqu'un objet est sur le point d'être détruit.
```

```php
class MyClass {
    public function __destruct() {
        echo "Object destroyed!";
    }
}

$obj = new MyClass();
unset($obj);  // Outputs: Object destroyed!
```

### __invoke

```plaintext
Appelé lorsqu'un objet est traité comme une fonction.
```

```php
class MyClass {
    public function __invoke($arg) {
        echo "Object invoked with argument: $arg";
    }
}

$obj = new MyClass();
$obj("Hello!");  // Outputs: Object invoked with argument: Hello!
```

### __clone

```plaintext
Appelé lorsqu'un objet est cloné.
```

```php
class MyClass {
    public function __clone() {
        echo "Object cloned!";
    }
}

$obj1 = new MyClass();
$obj2 = clone $obj1;  // Outputs: Object cloned!
```

### __set_state

```plaintext
Appelé pour les classes exportées par var_export().
```

```php
class MyClass {
    public static function __set_state($properties) {
        $obj = new self();
        $obj->property = $properties['property'];
        return $obj;
    }
}

$obj = new MyClass();
$obj->property = "Value";

$exported = var_export($obj, true);
eval('$newObj = ' . $exported . ';');

var_dump($newObj);  // Outputs: object(MyClass)#2 (1) { ["property"]=> string(5) "Value" }
```

## Utilisation de try, catch, et throw

### try

```plaintext
Le bloc try est utilisé pour entourer le code susceptible de générer une exception.
```

```php
try {
    // Code susceptible de générer une exception
} catch (Exception $e) {
    // Gestion de l'exception
}
```

### catch

```plaintext
Le bloc catch est utilisé pour capturer et gérer les exceptions générées dans le bloc try. Il spécifie le type d'exception à attraper.
```

```php
try {
    // Code susceptible de générer une exception
} catch (Exception $e) {
    // Gestion de l'exception
}
```

### throw

```plaintext
L'instruction throw est utilisée pour générer une exception. Elle est généralement utilisée dans une situation où une condition d'erreur est détectée.
```

```php
throw new Exception("Une erreur s'est produite.");
```

## Les principes SOLID

```plaintext
Les principes SOLID sont un ensemble de cinq principes de conception de logiciels qui favorisent la création de code robuste, évolutif et facile à maintenir. Voici une explication de chaque principe et comment les appliquer en PHP :
```

### Principe de Responsabilité Unique (Single Responsibility Principle - SRP)

```plaintext
**Définition** : Une classe ne devrait avoir qu'une seule raison de changer. En d'autres termes, une classe devrait avoir une seule responsabilité.

Application en PHP :

Divisez votre code en classes et méthodes avec des responsabilités spécifiques.
Évitez les classes qui ont trop de responsabilités.
```

```php
// Avant le SRP
class User {
    public function save() {
        // Code pour sauvegarder l'utilisateur en base de données
    }

    public function sendEmail() {
        // Code pour envoyer un e-mail à l'utilisateur
    }
}

// Après le SRP
class UserRepository {
    public function save(User $user) {
        // Code pour sauvegarder l'utilisateur en base de données
    }
}

class EmailService {
    public function sendEmail(User $user) {
        // Code pour envoyer un e-mail à l'utilisateur
    }
}
```

### Principe Ouvert/Fermé (Open/Closed Principle - OCP)

```plaintext
Définition : Une classe doit être ouverte à l'extension mais fermée à la modification. Vous pouvez ajouter de nouvelles fonctionnalités à une classe sans changer son code source.

Application en PHP :

Utilisez l'héritage, les interfaces, et la composition pour rendre les classes extensibles.
Évitez de modifier le code existant lorsque vous ajoutez de nouvelles fonctionnalités.
```

```php
// Avant le OCP
class Shape {
    public function area() {
        // Code pour calculer la surface
    }
}

// Après le OCP
interface Shape {
    public function area();
}

class Square implements Shape {
    public function area() {
        // Code pour calculer la surface du carré
    }
}

class Circle implements Shape {
    public function area() {
        // Code pour calculer la surface du cercle
    }
}
```

### Principe de Substitution de Liskov (Liskov Substitution Principle - LSP)

```plaintext
**Définition** : Les objets d'une classe dérivée doivent pouvoir remplacer les objets de la classe de base sans affecter la cohérence du programme.

Application en PHP :

Assurez-vous que les sous-classes peuvent être utilisées de manière interchangeable avec les classes de base sans introduire d'erreurs.
```

```php
// Violation du LSP
class Bird {
    public function fly() {
        // Code pour faire voler l'oiseau
    }
}

class Penguin extends Bird {
    public function fly() {
        throw new Exception("Les pingouins ne volent pas.");
    }
}
```

### Principe de Ségrégation d'Interface (Interface Segregation Principle - ISP)

```plaintext
**Définition** : Un client ne devrait pas être forcé à dépendre d'interfaces qu'il n'utilise pas.

Application en PHP :

Divisez les grandes interfaces en interfaces plus petites et spécifiques.
Évitez les interfaces "générales" que certaines classes n'utiliseraient qu'en partie.
```

```php
// Violation du ISP
interface Worker {
    public function work();
    public function eat();
}

class Robot implements Worker {
    public function work() {
        // Code pour faire travailler le robot
    }

    public function eat() {
        // Code inutile pour un robot
    }
}

// Après le ISP
interface Workable {
    public function work();
}

interface Eatable {
    public function eat();
}

class Human implements Workable, Eatable {
    public function work() {
        // Code pour faire travailler l'humain
    }

    public function eat() {
        // Code pour faire manger l'humain
    }
}
```

### Principe d'Inversion de Dépendance (Dependency Inversion Principle - DIP)

```plaintext
**Définition** : Les modules de haut niveau ne devraient pas dépendre des modules de bas niveau. Les deux devraient dépendre d'abstractions. Les abstractions ne devraient pas dépendre des détails, mais les détails devraient dépendre des abstractions.

Application en PHP :

Utilisez l'injection de dépendances (constructeur, méthode, ou propriété) pour inverser la dépendance.
Utilisez des interfaces et des abstractions pour définir des contrats.
```

```php
// Avant le DIP
class LightBulb {
    public function turnOn() {
        // Code pour allumer l'ampoule
    }

    public function turnOff() {
        // Code pour éteindre l'ampoule
    }
}

class Switch {
    private $bulb;

    public function __construct() {
        $this->bulb = new LightBulb();
    }

    public function operate() {
        // Code pour allumer ou éteindre l'ampoule
    }
}

// Après le DIP
interface Switchable {
    public function turnOn();
    public function turnOff();
}

class LightBulb implements Switchable {
    public function turnOn() {
        // Code pour allumer l'ampoule
    }

    public function turnOff() {
        // Code pour éteindre l'ampoule
    }
}

class Switch {
    private $device;

    public function __construct(Switchable $device) {
        $this->device = $device;
    }

    public function operate() {
        // Code pour allumer ou éteindre le dispositif
        $this->device->turnOn();
    }
}
```