<?php
/**
 * Created by PhpStorm.
 * User: training
 * Date: 3/26/19
 * Time: 2:14 PM
 */

namespace App\Contact\Model;


use DateTime;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Email;

class Contact
{
    /**
     * @var string
     * @NotBlank()
     */
    private $name;
    /**
     * @var string
     * @Email()
     */
    private $courriel;
    /**
     * @var string
     * @NotBlank()
     * @Length(max=128)
     */
    private $message;
    /**
     * @var DateTime
     */
    private $creationDate;

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getCourriel(): ?string
    {
        return $this->courriel;
    }

    /**
     * @param string $courriel
     */
    public function setCourriel(string $courriel): void
    {
        $this->courriel = $courriel;
    }

    /**
     * @return string
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return DateTime
     */
    public function getCreationDate(): ?DateTime
    {
        return $this->creationDate;
    }

    /**
     * @param DateTime $creationDate
     */
    public function setCreationDate(DateTime $creationDate): void
    {
        $this->creationDate = $creationDate;
    }
}