<?php
require 'Controlador.php';
require 'Cargar.php';
class Ver extends Controlador
{
    public function login()
    {
        $this->vista2('pag_login');
    }

    public function dashboard()
    {
        $this->vista2('pag_dashboard');
    }

    public function categorias()
    {
        $this->vista2('pag_category');
    }

    public function rol()
    {
        $this->vista2('pag_rol');
    }

    public function productos()
    {
        $this->vista2('pag_product');
    }

    public function libreria_personal()
    {
        $this->vista2('pag_library_user');
    }

    public function miembros()
    {
        $this->vista2('pag_members');
    }

    public function membresias()
    {
        $this->vista2('pag_membership');
    }

    public function suscripciones()
    {
        $this->vista2('pag_suscriptions');
    }

    public function pagos()
    {
        $this->vista2('pag_payments');
    }
    public function bibliotecadigital()
    {
        $this->vista2('biblioteca');
    }
    public function verLibro()
    {
        $this->vista2('viewPdf');
    }

    public function libro()
    {
        $this->vista2('books');
    }

    public function perfil()
    {
        $this->vista2('perfil');
    }
}
