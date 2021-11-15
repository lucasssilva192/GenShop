package com.teyvat.genshop.models

data class Endereco(
    var costumer_id: Number?,
    var cep: String,
    var state: String,
    var city: String,
    var address: String,
    var number: String,
    var main: String
)