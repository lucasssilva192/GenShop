package com.teyvat.genshop.models

import java.util.*

data class Cliente(
    var first_name: String,
    var last_name: String,
    var birth_date: String,
    var cpf: String,
    var telephone: String,
    var cellphone: String
)