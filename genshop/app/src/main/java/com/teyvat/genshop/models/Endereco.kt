package com.teyvat.genshop.models

data class Endereco(
    val id: Int? = null,
    var name: String,
    var cep: String,
    var state: String,
    var city: String,
    var address: String,
    var complement: String,
    var number: String,
    var main: String
)