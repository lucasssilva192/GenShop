package com.teyvat.genshop

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import com.squareup.picasso.Picasso
import com.teyvat.genshop.databinding.ActivityShowProdutoBinding
import com.teyvat.genshop.models.Produto
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class ShowProdutoActivity : AppCompatActivity() {
    lateinit var binding: ActivityShowProdutoBinding

    override fun onCreate(savedInstanceState: Bundle?) {
        binding = ActivityShowProdutoBinding.inflate(layoutInflater)
        super.onCreate(savedInstanceState)
        setContentView(binding.root)

        val nomeProd = intent.getStringExtra("nomeProd")
        val precoProd = intent.getStringExtra("precoProd")
        val descProd = intent.getStringExtra("descProd")
        val categoriaProd = intent.getStringExtra("categoriaProd")
        val id = intent.getIntExtra("id", 0)

        binding.txtNomeProd.text = nomeProd
        binding.txtPreco.text = precoProd
        binding.txtDescricao.text = descProd
        binding.txtCatProd.text = categoriaProd
        Picasso.get().load("http://192.168.3.26/api/product/image/${id}").into(binding.imgProd)
    }
}