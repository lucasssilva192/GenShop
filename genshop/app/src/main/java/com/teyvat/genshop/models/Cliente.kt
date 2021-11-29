package com.teyvat.genshop.models

data class Cliente(
    val id: Int? = null,
    var first_name: String,
    var last_name: String,
    var birth_date: String,
    var cpf: String,
    var telephone: String,
    var cellphone: String
)