package com.teyvat.genshop.models

import java.io.Serializable

data class Endereco(
    var id: Int? = null,
    var name: String,
    var cep: String,
    var state: String,
    var city: String,
    var address: String,
    var complement: String,
    var number: String,
    var main: String
): Serializable

enum class EnumTipoEndereco(val valor: String) {
    Selecionado("1"),
    NaoSelecionado("0")
}