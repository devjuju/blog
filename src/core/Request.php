<?php

declare(strict_types=1); // Active le typage strict pour éviter les conversions implicites de types

namespace App\Core; // Définit l'espace de noms pour organiser le code

/**
 * Classe Request
 * Sert à encapsuler les superglobales $_POST et $_GET
 */
class Request
{
    // Stocke les données POST
    private array $_post;

    // Stocke les données GET
    private array $_get;

    /**
     * Constructeur
     * Initialise les propriétés avec les superglobales $_POST et $_GET
     */
    public function __construct()
    {
        $this->_post = $_POST;
        $this->_get = $_GET;
    }

    /**
     * Récupère une valeur depuis $_POST
     * @param string|null $key Clé spécifique à récupérer, ou null pour récupérer tout
     * @return mixed La valeur associée à la clé ou le tableau complet
     */
    public function post(?string $key = null): mixed
    {
        return $this->checkGlobal($this->_post, $key);
    }

    /**
     * Récupère une valeur depuis $_GET
     * @param string|null $key Clé spécifique à récupérer, ou null pour récupérer tout
     * @return mixed La valeur associée à la clé ou le tableau complet
     */
    public function get(?string $key = null): mixed
    {
        return $this->checkGlobal($this->_get, $key);
    }

    /**
     * Méthode privée utilisée pour accéder aux valeurs d'un tableau associatif
     * @param array $global Tableau à interroger ($_POST ou $_GET)
     * @param string|null $key Clé spécifique ou null pour tout retourner
     * @return mixed
     */
    private function checkGlobal(array $global, ?string $key = null): mixed
    {
        if ($key !== null) {
            return $global[$key] ?? null; // Retourne la valeur ou null si la clé n'existe pas
        }
        return $global; // Retourne le tableau complet si aucune clé n'est précisée
    }
}
