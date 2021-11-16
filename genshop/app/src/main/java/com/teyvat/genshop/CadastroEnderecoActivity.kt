package com.teyvat.genshop

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
import androidx.core.widget.doOnTextChanged
import com.google.android.material.snackbar.Snackbar
import com.teyvat.genshop.api.API
import com.teyvat.genshop.databinding.ActivityCadastroEnderecoBinding
import com.teyvat.genshop.menu.MenuActivity
import com.teyvat.genshop.models.Cliente
import com.teyvat.genshop.models.Endereco
import com.teyvat.genshop.utils.Sessao
import com.teyvat.genshop.utils.Utilitarios
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class CadastroEnderecoActivity : AppCompatActivity() {
    lateinit var binding: ActivityCadastroEnderecoBinding

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityCadastroEnderecoBinding.inflate(layoutInflater)
        setContentView(binding.root)

        binding.txtNome.doOnTextChanged{ text, start, before, count -> binding.txtNomeLayout.isErrorEnabled = false  }
        binding.txtCep.doOnTextChanged{ text, start, before, count -> binding.txtCepLayout.isErrorEnabled = false  }
        binding.txtEstado.doOnTextChanged{ text, start, before, count -> binding.txtEstadoLayout.isErrorEnabled = false  }
        binding.txtCidade.doOnTextChanged{ text, start, before, count -> binding.txtCidadeLayout.isErrorEnabled = false  }
        binding.txtEndereco.doOnTextChanged{ text, start, before, count -> binding.txtEnderecoLayout.isErrorEnabled = false  }
        binding.txtNumero.doOnTextChanged{ text, start, before, count -> binding.txtNumeroLayout.isErrorEnabled = false  }

        binding.btnCadastrarEndereco.setOnClickListener(){
            if(validarFormulario()){
                cadastrarEndereco()
            }
        }

        binding.btnCancelarCadastro.setOnClickListener(){
            cancelarCadastro();
        }

    }

    fun cadastrarEndereco(){
        val callback = object : Callback<Endereco> {
            override fun onResponse(call: Call<Endereco>, response: Response<Endereco>) {
                if(response.isSuccessful) {
                    Sessao.endereco = response.body()
                    Utilitarios.abrirTela(this@CadastroEnderecoActivity, MenuActivity::class.java)
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

        var endereco = Endereco(nome, cep, estado, cidade, enderecoDetalhe, compemento, numero, "1")
        API().endereco.cadastrar("Bearer ${Sessao.usuario?.token}", endereco).enqueue(callback)
    }

    fun cancelarCadastro(){
        //Limpar usuairo da sessao aqui
        Utilitarios.abrirTela(this, LoginActivity::class.java)
        finish()
    }

    fun validarFormulario(): Boolean {
        if (binding.txtCep.text.isNullOrEmpty()) {
            binding.txtCepLayout.error = "Digite o Sobrenome"
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

}