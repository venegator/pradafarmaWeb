<?php
namespace App\Filters;
use App\User;
class CitasFilters extends Filters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = ['nutri', 'pielr', 'piel', 'capilar', 'pedi', 'celu', 'cabina', 'sangui', 'hipi'];

    /**
     * Filter the query according to most popular threads.
     *
     * @return $this
     */
    protected function nutri()
    {
        $this->builder->getQuery()->orders = [];
        return $this->builder->where('servicio', 'Nutricionista');
    }

    /**
     * Filter the query according to most popular threads.
     *
     * @return $this
     */
    protected function pielr()
    {
        $this->builder->getQuery()->orders = [];
        return $this->builder->where('servicio', 'Análisis de piel rápido');
    }

    /**
     * Filter the query according to most popular threads.
     *
     * @return $this
     */
    protected function piel()
    {
        $this->builder->getQuery()->orders = [];
        return $this->builder->where('servicio', 'Análisis de piel con informe');
    }

    /**
     * Filter the query according to most popular threads.
     *
     * @return $this
     */
    protected function capilar()
    {
        $this->builder->getQuery()->orders = [];
        return $this->builder->where('servicio', 'Análisis capilar');
    }

    /**
     * Filter the query according to most popular threads.
     *
     * @return $this
     */
    protected function pedi()
    {
        $this->builder->getQuery()->orders = [];
        return $this->builder->where('servicio', 'Identificación pedicular');
    }

    /**
     * Filter the query according to most popular threads.
     *
     * @return $this
     */
    protected function celu()
    {
        $this->builder->getQuery()->orders = [];
        return $this->builder->where('servicio', 'Análisis celulitis');
    }

    /**
     * Filter the query according to most popular threads.
     *
     * @return $this
     */
    protected function cabina()
    {
        $this->builder->getQuery()->orders = [];
        return $this->builder->where('servicio', 'Tratamiento en cabina');
    }

    /**
     * Filter the query according to most popular threads.
     *
     * @return $this
     */
    protected function sangui()
    {
        $this->builder->getQuery()->orders = [];
        return $this->builder->where('servicio', 'Grupo sanguíneo');
    }

    /**
     * Filter the query according to most popular threads.
     *
     * @return $this
     */
    protected function hipi()
    {
        $this->builder->getQuery()->orders = [];
        return $this->builder->where('servicio', 'Perfil hipídico');
    }
}