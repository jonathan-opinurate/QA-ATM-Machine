<?php
/**
 * Created by IntelliJ IDEA.
 * User: jonathan
 * Date: 05/11/15
 * Time: 13:31
 */


namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Role\Role;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="user_account")
 */
class AccountHolder implements UserInterface, \Serializable
{

    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=50, name="name")
     */
    protected $name;

    /**
     * @ORM\Column (type="string", length=50, name="surname")
     */
    protected $surname;

    /**
     * @ORM\Column(type="integer", name="account_number")
     */
    protected $acc_no;

    /**
     * @ORM\Column(type="integer", name="pin_number")
     */
    protected $pin_no;

    /**
     * @ORM\Column(type="integer", name="balance")
     */
    protected $balance;

    /**
     * @ORM\Column(type="integer", name="withdrawn")
     */
    protected $cashOut;

    protected $newBalance;

    /**
     * Set name
     *
     * @param string $name
     *
     * @return AccountHolder
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set name
     *
     * @param string $surname
     *
     * @return AccountHolder
     */
    public function setSurame($surname)
    {
        $this->surname= $surname;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getSurame()
    {
        return $this->surname;
    }

    /**
     * Set accNo
     *
     * @param integer $accNo
     *
     * @return AccountHolder
     */
    public function setAccNo($accNo)
    {
        $this->acc_no = $accNo;

        return $this;
    }

    /**
     * Get accNo
     *
     * @return integer
     */
    public function getAccNo()
    {
        return $this->acc_no;
    }

    /**
     * Set pinNo
     *
     * @param integer $pinNo
     *
     * @return AccountHolder
     */
    public function setPinNo($pinNo)
    {
        $this->pin_no = $pinNo;

        return $this;
    }

    /**
     * Get pinNo
     *
     * @return integer
     */
    public function getPinNo()
    {
        return $this->pin_no;
    }

    /**
     * Set balance
     *
     * @param integer $balance
     *
     * @return AccountHolder
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;

        return $this;
    }

    /**
     * Get balance
     *
     * @return integer
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * Set cashOut
     *
     * @param integer $cashOut
     *
     * @return AccountHolder
     */
    public function setCashOut($cashOut)
    {
        $this->cashOut = $cashOut;

        return $this;
    }

    /**
     * Get cashOut
     *
     * @return integer
     */
    public function getCashOut()
    {
        return $this->cashOut;
    }

    /**
     * (PHP 5 &gt;= 5.1.0)<br/>
     * String representation of object
     * @link http://php.net/manual/en/serializable.serialize.php
     * @return string the string representation of the object or null
     */
    public function serialize()
    {
        return serialize([
           $this->acc_no,
            $this->pin_no,
            $this->name,
            $this->surname,
            $this->balance,
            $this->cashOut
        ]);
    }

    /**
     * (PHP 5 &gt;= 5.1.0)<br/>
     * Constructs the object
     * @link http://php.net/manual/en/serializable.unserialize.php
     * @param string $serialized <p>
     * The string representation of the object.
     * </p>
     * @return void
     */
    public function unserialize($serialized)
    {
        list (
            $this->acc_no,
            $this->pin_no,
            $this->name,
            $this->id,
            $this->balance,
            $this->cashOut
            ) =unserialize($serialized);
    }

    /**
     * Returns the roles granted to the user.
     *
     * <code>
     * public function getRoles()
     * {
     *     return array('ROLE_USER');
     * }
     * </code>
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return Role[] The user roles
     */
    public function getRoles()
    {
        if ($this->acc_no === 999999 && $this->pin_no === 1234) {
            return ['ROLE_USER', 'ROLE_MANAGER'];
        } else {
            return ['ROLE_USER'];
}
    }

    /**
     * Returns the password used to authenticate the user.
     *
     * This should be the encoded password. On authentication, a plain-text
     * password will be salted, encoded, and then compared to this value.
     *
     * @return string The password
     */
    public function getPassword()
    {
        return $this->pin_no;
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername()
    {
       return $this->acc_no;
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    /**
     * Set surname
     *
     * @param string $surname
     *
     * @return AccountHolder
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }
}
