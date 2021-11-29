package com.teyvat.genshop.models

import java.io.Serializable

data class Compra(
    val id: Int? = null,
    var customer_id: Int? = null,
    var store_id: Int? = null,
    var address_id: Int? = null,
    var price: String? = null,
    var status: String? = null,
    var pagto: String? = null
):Serializable
