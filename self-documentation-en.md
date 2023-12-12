# Object-Oriented Programming (OOP) in PHP

## Definition

```plaintext
Object-Oriented Programming (OOP) is a programming paradigm that revolves around the concept of objects—entities that encapsulate data and the methods that operate on that data. In PHP, OOP is widely supported, allowing developers to structure their code in a more modular and reusable way.
```

## Creating Classes and Objects in PHP

```plaintext
**Classes**: A class is a blueprint or a plan for creating objects. It defines the properties (attributes) and methods (functions) that characterize objects created from that class.
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
**Objects**: An object is an instance of a class. An object is created by instantiating a class.
```

```php
$myObject = new MyClass();
```

## Encapsulation and Access Modifiers:

### Definition

```plaintext
Encapsulation is the concept of grouping data (attributes) and the methods that operate on that data within the same unit, the class. Access modifiers (public, private, and protected) define the visibility of properties and methods within and outside the class.
```

```plaintext
**Public**: Properties and methods are accessible from anywhere.
```

```php
class Example {
    public $publicProp;

    public function publicMethod() {
        // Code
    }
}
```

```plaintext
**Private**: Properties and methods are only accessible within the class.
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
**Protected**: Protected members are accessible within the class itself and its derived classes (inheritance).
```

```php
class Example {
    protected $protectedVar = "Accessible within the class and its derived classes";
}
```

## Inheritance and Polymorphism

```plaitext
**Inheritance**: It allows a class (derived class) to inherit properties and methods from another class (base class).
```

```php
class Animal {
    public function eat() {
        echo "The animal is eating";
    }
}

class Dog extends Animal {
    // This class inherits the eat method
}
```

```plaintext
**Polymorphism**: It allows a class to provide a specific implementation of an inherited method.
```

```php
class Animal {
    public function makeSound() {
        echo "The sound of the animal";
    }
}

class Dog extends Animal {
    public function makeSound() {
        echo "Bark";
    }
}

class Cat extends Animal {
    public function makeSound() {
        echo "Meow";
    }
}
```

## Interfaces and Traits

```plaintext
**Interfaces**: Interfaces define contracts that classes must follow. They declare methods that a class must implement, but they do not implement the code themselves. A class can implement multiple interfaces.
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
**Traits**: Traits are mechanisms for horizontal code reuse. They allow the inclusion of methods in a class without using inheritance. A class can use multiple traits.

```

```php
trait LogTrait {
    public function log($message) {
        // Implementation of the log method for the trait
    }
}

class FileLogger {
    use LogTrait;
}
```

## Namespaces et Autoloading

```plaintext
**Namespaces**: Namespaces allow organizing code by grouping classes, interfaces, functions, etc., under a specific name.
```

```php
namespace MyProject;

class MyClass {
    // ...
}
```

```plaintext
**Autoloading**: Autoloading enables the automatic loading of classes without the need for manual inclusion. Using an autoloading function like spl_autoload_register is common.
```

```php
// Example of autoloading with an anonymous function
spl_autoload_register(function ($class) {
    include 'path/to/' . $class . '.php';
});
```

## Magic Methods

```plaintext
**Magic methods** are special methods with predefined names, typically starting with two underscores. They allow intercepting specific method calls and implementing custom behaviors.
```

### __get

```plaintext
Called when accessing an inaccessible property.
```

```php
class Example {
    private $data = array();

    public function __get($property) {
        if (isset($this->data[$property])) {
            return $this->data[$property];
        } else {
            return null;
        }
    }
}
```

### __set

```plaintext
Called when an inaccessible property is modified.
```

```php
class Example {
    private $data = array();

    public function __set($property, $value) {
        $this->data[$property] = $value;
    }
}
```

### __isset

```plaintext
Called when isset() or empty() is used on an inaccessible property.
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
Called when unset() is used on an inaccessible property.
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
Called when an object is treated as a string.
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
Called when an inaccessible method is invoked.
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
Called when an inaccessible static method is invoked.
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
**Constructor** method called when an object is created.
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
**Destructor** method called when an object is about to be destroyed.
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
Called when an object is treated as a function.
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
Called when an object is cloned.
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
Called for classes exported by var_export().
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

## Using try, catch, and throw

### try

```plaintext
The try block is used to surround code that may throw an exception.
```

```php
try {
    // Code that may throw an exception
} catch (Exception $e) {
    // Exception handling
}
```

### catch

```plaintext
The catch block is used to catch and handle exceptions thrown in the try block. It specifies the type of exception to catch.
```

```php
try {
    // Code that may throw an exception
} catch (Exception $e) {
    // Exception handling
}
```

### throw

```plaintext
The throw statement is used to throw an exception. It is typically used in a situation where an error condition is detected.
```

```php
throw new Exception("An error occurred.");
```

## SOLID Principles

```plaintext
The SOLID principles are a set of five software design principles that promote the creation of robust, scalable, and maintainable code. Here's an explanation of each principle and how to apply them in PHP:
```

### Single Responsibility Principle (SRP)

```plaintext
**Definition**: A class should have only one reason to change. In other words, a class should have a single responsibility.

Application in PHP:

Divide your code into classes and methods with specific responsibilities.
Avoid classes that have too many responsibilities.
```

```php
// Before SRP
class User {
    public function save() {
        // Code to save the user to the database
    }

    public function sendEmail() {
        // Code to send an email to the user
    }
}

// After SRP
class UserRepository {
    public function save(User $user) {
        // Code to save the user to the database
    }
}

class EmailService {
    public function sendEmail(User $user) {
        // Code to send an email to the user
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