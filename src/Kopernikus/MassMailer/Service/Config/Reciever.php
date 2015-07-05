<?php
namespace Kopernikus\MassMailer\Service\Config;

/**
 * Class Reciever
 * @package Kopernikus\MassMailer\Service\Config
 */
class Reciever
{
    /**
     * @var string
     */
    private $firstname = '';

    /**
     * @var string
     */
    private $lastname = '';

    /**
     * @var string
     */
    private $gender = '';

    /**
     * @var string
     */
    private $email = '';

    /**
     * @param array $reciever
     */
    public function __construct(array $reciever)
    {
        $this->setFirstname($reciever['firstname']);
        $this->setLastname($reciever['lastname']);
        $this->setGender($reciever['gender']);
        $this->setEmail($reciever['email']);
    }

    /**
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return string
     */

    public function getFullName()
    {
        return $this->getFirstname() . ' ' . $this->getLastname();
    }

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     */
    public function setGender($gender)
    {
        $allowedValues = [
            'female',
            'neutral',
            'male',
        ];

        if (!in_array($gender, $allowedValues)) {
            throw new \InvalidArgumentException($gender);
        }


        $this->gender = $gender;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }
}