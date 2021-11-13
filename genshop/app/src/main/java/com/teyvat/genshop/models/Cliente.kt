package com.teyvat.genshop.models

data class Cliente(
    var usuario: Usuario?,
    var nome: String,
    var sobrenome: String,
    var dataNascimento: String,
    var cpf: String,
    var telefone: String,
    var celular: String
)