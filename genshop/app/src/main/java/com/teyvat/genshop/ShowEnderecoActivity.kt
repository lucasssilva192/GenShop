package com.teyvat.genshop

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
import android.view.View
import androidx.core.widget.doOnTextChanged
import com.google.android.material.snackbar.Snackbar
import com.teyvat.genshop.api.API
import com.teyvat.genshop.api.ViaCepAPI
import com.teyvat.genshop.api.ViaCepRetrofit
import com.teyvat.genshop.databinding.ActivityShowEnderecoBinding
import com.teyvat.genshop.menu.MenuActivity
import com.teyvat.genshop.models.Compra
import com.teyvat.genshop.models.Endereco
import com.teyvat.genshop.models.EnumTipoEndereco
import com.teyvat.genshop.models.ViaCEP
import com.teyvat.genshop.utils.Sessao
import com.teyvat.genshop.utils.Utilitarios
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response
import retrofit2.Retrofit
import retrofit2.converter.gson.GsonConverterFactory

class ShowEnderecoActivity : AppCompatActivity() {
    lateinit var binding:ActivityShowEnderecoBinding
    lateinit var endereco: Endereco
    var cadastro = false

    override fun onCreate(savedInstanceState: Bundle?) {
        binding = ActivityShowEnderecoBinding.inflate(layoutInflater)
        super.onCreate(savedInstanceState)
        Utilitarios.aplicarTema(this, delegate)
        setContentView(binding.root)

        cadastro = intent.getBooleanExtra("cadastro", false)
        if(!cadastro){
            endereco = (intent.getSerializableExtra("endereco") as? Endereco)!!
            preencherFormulario(endereco!!)
        }

        binding.txtCep.doOnTextChanged{ text, start, before, count -> binding.txtCepLayout.isErrorEnabled = false  }
        binding.txtEstado.doOnTextChanged{ text, start, before, count -> binding.txtEstadoLayout.isErrorEnabled = false  }
        binding.txtCidade.doOnTextChanged{ text, start, before, count -> binding.txtCidadeLayout.isErrorEnabled = false  }
        binding.txtEndereco.doOnTextChanged{ text, start, before, count -> binding.txtEnderecoLayout.isErrorEnabled = false  }
        binding.txtNumero.doOnTextChanged{ text, start, before, count -> binding.txtNumeroLayout.isErrorEnabled = false  }

        binding.txtCep.setOnFocusChangeListener { view, b ->
            if(!b){
                requisitaViaCep()
            }
        }

        binding.btnSalvarEndereco.setOnClickListener(){
            if(validarFormulario()){
                if(!cadastro)
                    atualizarEndereco()
                else
                    cadastrarEndereco()
            }
        }

        binding.btnCancelar.setOnClickListener(){
            finish()
        }

    }

    fun preencherFormulario(endereco: Endereco){
        binding.txtNome.setText(endereco.name)
        binding.txtCep.setText(endereco.cep)
        binding.txtEstado.setText(endereco.state)
        binding.txtCidade.setText(endereco.city)
        binding.txtEndereco.setText(endereco.address)
        binding.txtNumero.setText(endereco.number)
        binding.txtComplemento.setText(endereco.complement)
    }

    fun atualizarEndereco(){
        val callback = object : Callback<Endereco> {
            override fun onResponse(call: Call<Endereco>, response: Response<Endereco>) {
                if(response.isSuccessful) {
                    Sessao.endereco = response.body()
                    Utilitarios.snackBar(binding.root, "Endereço atualizado com sucesso!", Snackbar.LENGTH_LONG)
                    finish()
                }
                else {
                    val error = response.errorBody().toString()
                    Utilitarios.snackBar(binding.root, error, Snackbar.LENGTH_LONG)
                    Log.e("ERROR", response.errorBody().toString())
                }
            }
            override fun onFailure(call: Call<Endereco>, t: Throwable) {
                Utilitarios.snackBar(binding.root, "Falha ao conectar com o servidor. ${t.message}", Snackbar.LENGTH_LONG)
                Log.e("ERROR","${t.message}")
            }
        }

        val nome = binding.txtNome.text.toString()
        val cep = binding.txtCep.text.toString()
        val estado = binding.txtEstado.text.toString()
        val cidade = binding.txtCidade.text.toString()
        val enderecoDetalhe = binding.txtEndereco.text.toString()
        val compemento = binding.txtComplemento.text.toString()
        val numero = binding.txtNumero.text.toString()

        var enderecoAlterado = Endereco(endereco.id, nome, cep, estado, cidade, enderecoDetalhe, compemento, numero, endereco.main)
        API().endereco.atualizar(endereco.id!!,"Bearer ${Sessao.usuario?.token}", enderecoAlterado).enqueue(callback)
    }

    fun cadastrarEndereco(){
        val callback = object : Callback<Endereco> {
            override fun onResponse(call: Call<Endereco>, response: Response<Endereco>) {
                if(response.isSuccessful) {
                    //Sessao.endereco = response.body()
                    Utilitarios.snackBar(binding.root, "Endereço cadastrado com sucesso!", Snackbar.LENGTH_LONG)
                    finish()
                }
                else {
                    val error = response.errorBody().toString()
                    Utilitarios.snackBar(binding.root, error, Snackbar.LENGTH_LONG)
                }
            }
            override fun onFailure(call: Call<Endereco>, t: Throwable) {
                Utilitarios.snackBar(binding.root, "Falha ao conectar com o servidor. ${t.message}", Snackbar.LENGTH_LONG)
            }
        }

        val nome = binding.txtNome.text.toString()
        val cep = binding.txtCep.text.toString()
        val estado = binding.txtEstado.text.toString()
        val cidade = binding.txtCidade.text.toString()
        val enderecoDetalhe = binding.txtEndereco.text.toString()
        val compemento = binding.txtComplemento.text.toString()
        val numero = binding.txtNumero.text.toString()

        var enderecoAlterado = Endereco(null, nome, cep, estado, cidade, enderecoDetalhe, compemento, numero, "0")
        API().endereco.cadastrar("Bearer ${Sessao.usuario?.token}", enderecoAlterado).enqueue(callback)
    }

    fun validarFormulario(): Boolean {
        if (binding.txtCep.text.isNullOrEmpty()) {
            binding.txtCepLayout.error = "Digite um CEP valido"
            binding.txtCep.requestFocus()
            return false
        }
        else if (binding.txtEstado.text.isNullOrEmpty()) {
            binding.txtEstadoLayout.error = "Digite uma estado valido"
            binding.txtEstado.requestFocus()
            return false
        }
        else if (binding.txtCidade.text.isNullOrEmpty()) {
            binding.txtCidadeLayout.error = "Digite uma cidade valido"
            binding.txtCidade.requestFocus()
            return false
        }
        else if (binding.txtEndereco.text.isNullOrEmpty()) {
            binding.txtEnderecoLayout.error = "Digite um endereço valido"
            binding.txtEndereco.requestFocus()
            return false
        }
        else if (binding.txtNumero.text.isNullOrEmpty()) {
            binding.txtNumeroLayout.error = "Digite um número valido"
            binding.txtNumero.requestFocus()
            return false
        }
        else {
            return true
        }
    }

    fun requisitaViaCep() {
        val callback = object: Callback<ViaCEP> {
            override fun onResponse(call: Call<ViaCEP>, response: Response<ViaCEP>) {
                if (response.isSuccessful) {
                    response.body()?.let {
                        preencherEnderecoViaCEP(it)
                        binding.txtComplemento.requestFocus()
                    }
                }
                else {
                    Utilitarios.snackBar(binding.root, "Não foi possível buscar o cep informado", Snackbar.LENGTH_SHORT)
                }
            }
            override fun onFailure(call: Call<ViaCEP>, t: Throwable) {
                Utilitarios.snackBarRequestFaliure(binding.root)
            }
        }

        ViaCepRetrofit().viacep.buscarCep(binding.txtCep.text.toString()).enqueue(callback)
    }

    fun preencherEnderecoViaCEP(viaCEP: ViaCEP){
        binding.txtEstado.setText(viaCEP.uf)
        binding.txtCidade.setText(viaCEP.localidade)
        binding.txtEndereco.setText(viaCEP.logradouro)
    }

}