package com.teyvat.genshop.utils

import com.teyvat.genshop.models.Cliente
import com.teyvat.genshop.models.Endereco
import com.teyvat.genshop.models.Usuario

object Sessao {
    var usuario: Usuario? = null
    var cliente: Cliente? = null
    var endereco: Endereco? = null
}