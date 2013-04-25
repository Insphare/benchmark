<?php

class Chaining extends Benchmark_Abstract {

	public function getShortDescription() {
		return 'Chaining against single calls';
	}

	public function getLongDescription() {
		return 'Chaining vs. single calls.';
	}

	public function getLoops() {
		return 10000;
	}

	public function benchmark_chaining_chain() {
		$person = new Person();
		$person->setAge( 24 )->setFirstName('Manu')->setLastName('Secret')->setHeight('23');
		return (string)$person;
	}

	public function benchmark_single_call() {
		$person = new Person();
		$person->setAge( 24 );
		$person->setFirstName('Manu');
		$person->setLastName('Secret');
		$person->setHeight('23');
		return (string)$person;
	}
}

class Person {

	private $firstName;
	private $lastName;
	private $age;
	private $height;

	/**
	 * @param $age
	 *
	 * @return $this
	 */
	public function setAge( $age ) {
		$this->age = $age;

		return $this;
	}

	/**
	 * @param $firstName
	 *
	 * @return $this
	 */
	public function setFirstName( $firstName ) {
		$this->firstName = $firstName;
		return $this;
	}

	/**
	 * @param $height
	 *
	 * @return $this
	 */
	public function setHeight( $height ) {
		$this->height = $height;
		return $this;
	}

	/**
	 * @param $lastName
	 *
	 * @return $this
	 */
	public function setLastName( $lastName ) {
		$this->lastName = $lastName;
		return $this;
	}

	public function __toString() {
		$data = array(
			$this->lastName,
			$this->firstName,
			$this->age,
			$this->height
		);

		return implode( ', ', $data );
	}
}