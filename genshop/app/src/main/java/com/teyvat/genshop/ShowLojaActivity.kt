package com.teyvat.genshop

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import com.squareup.picasso.Picasso
import com.teyvat.genshop.databinding.ActivityShowLojaBinding

class ShowLojaActivity : AppCompatActivity() {
    lateinit var binding: ActivityShowLojaBinding

    override fun onCreate(savedInstanceState: Bundle?) {
        binding = ActivityShowLojaBinding.inflate(layoutInflater)
        super.onCreate(savedInstanceState)
        setContentView(binding.root)

        val nomeLoja = intent.getStringExtra("nomeLoja")
        val tipoLoja = intent.getStringExtra("tipoLoja")
        val telefoneLoja = intent.getStringExtra("telefone")
        val celularLoja = intent.getStringExtra("celular")
        val enderecoLoja = intent.getStringExtra("endereco")
        val id = intent.getIntExtra("id", 0)

        binding.txtNomeLoja.text = nomeLoja
        binding.txtTipoLoja.text = tipoLoja
        binding.txtCelular.text = celularLoja
        binding.txtTelefone.text = telefoneLoja
        binding.txtEndereco.text = enderecoLoja
        Picasso.get().load("http://192.168.3.26/api/store/image/${id}").into(binding.imgLoja)
    }
}