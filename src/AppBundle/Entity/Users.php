<?php

namespace AppBundle\Entity;

/**
 * Users
 *
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="src\AppBundle\Repository\NewsRepository")
 */
class Users
{
    private const USER_ROLE  = 0;
    private const ADMIN_ROLE = 1;

    private $userRoles = [
        self::USER_ROLE  => 'user',
        self::ADMIN_ROLE => 'admin',
    ];

    /**
     * @var int
     *
     * @ORM\Column(name="Usr_Id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Usr_Name", type="string", length=30, nullable=false)
     */
    private $userName;

    /**
     * @var int
     *
     * @ORM\Column(name="Usr_Role", nullable=false)
     */
    private $role;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Usr_Date_Created", type="datetime", nullable=false)
     */
    private $dateCreated;

    /**
     * @return int
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return Users
     */
    public function setId(int $id) : self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return array
     */
    public function getUserRoles (): array
    {
        return $this->userRoles;
    }

    /**
     * @param array $userRoles
     *
     * @return Users
     */
    public function setUserRoles (array $userRoles): self
    {
        $this->userRoles = $userRoles;

        return $this;
    }

    /**
     * @return string
     */
    public function getUserName (): string
    {
        return $this->userName;
    }

    /**
     * @param string $userName
     *
     * @return Users
     */
    public function setUserName (string $userName): self
    {
        $this->userName = $userName;

        return $this;
    }

    /**
     * @return int
     */
    public function getRole (): int
    {
        return $this->role;
    }

    /**
     * @param int $role
     *
     * @return Users
     */
    public function setRole (int $role): self
    {
        $this->role = $role;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateCreated (): \DateTime
    {
        return $this->dateCreated;
    }

    /**
     * @param \DateTime $dateCreated
     *
     * @return Users
     */
    public function setDateCreated (\DateTime $dateCreated): self
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }
}
