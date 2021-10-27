package com.teyvat.genshop.utils

import com.teyvat.genshop.models.Cliente

object Sessao {
    var token: String = ""
    var cliente: Cliente = Cliente("","")
}