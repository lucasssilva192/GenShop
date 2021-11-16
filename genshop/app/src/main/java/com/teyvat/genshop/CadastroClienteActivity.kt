package com.teyvat.genshop

import android.os.Build
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
import androidx.annotation.RequiresApi
import androidx.core.widget.doOnTextChanged
import com.google.android.material.snackbar.Snackbar
import com.teyvat.genshop.api.API
import com.teyvat.genshop.databinding.ActivityCadastroClienteBinding
import com.teyvat.genshop.menu.MenuActivity
import com.teyvat.genshop.models.Cliente
import com.teyvat.genshop.models.Usuario
import com.teyvat.genshop.utils.Sessao
import com.teyvat.genshop.utils.Utilitarios
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response
import java.lang.String.valueOf
import java.text.SimpleDateFormat
import java.time.LocalDate
import java.time.format.DateTimeFormatter
import java.util.*

class CadastroClienteActivity : AppCompatActivity() {
    lateinit var binding: ActivityCadastroClienteBinding

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityCadastroClienteBinding.inflate(layoutInflater)
        setContentView(binding.root)

        binding.txtNome.doOnTextChanged{ text, start, before, count -> binding.txtNomeLayout.isErrorEnabled = false  }
        binding.txtSobrenome.doOnTextChanged{ text, start, before, count -> binding.txtSobrenomeLayout.isErrorEnabled = false  }
        binding.txtDataNascimento.doOnTextChanged{ text, start, before, count -> binding.txtDataNascimentoLayout.isErrorEnabled = false  }
        binding.txtCPF.doOnTextChanged{ text, start, before, count -> binding.txtCPFLayout.isErrorEnabled = false  }
        binding.txtTelefone.doOnTextChanged{ text, start, before, count -> binding.txtTelefoneLayout.isErrorEnabled = false  }
        binding.txtCelular.doOnTextChanged{ text, start, before, count -> binding.txtCelularLayout.isErrorEnabled = false  }

        binding.btnCadastrarCliente.setOnClickListener(){
            if(validarFormulario()){
                cadastrarCliente()
            }
        }

        binding.btnCancelarCadastro.setOnClickListener(){
            cancelarCadastro();
        }

    }

    fun cadastrarCliente(){
        val callback = object : Callback<Cliente> {
            override fun onResponse(call: Call<Cliente>, response: Response<Cliente>) {
                if(response.isSuccessful) {
                    Sessao.cliente = response.body()
                    Utilitarios.abrirTela(this@CadastroClienteActivity, CadastroEnderecoActivity::class.java)
                }
                else {
                    val error = response.errorBody().toString()
                    Utilitarios.snackBar(binding.root, error, Snackbar.LENGTH_LONG)
                    Log.e("ERROR", response.errorBody().toString())
                }
            }
            override fun onFailure(call: Call<Cliente>, t: Throwable) {
                Utilitarios.snackBar(binding.root, "Falha ao conectar com o servidor. ${t.message}", Snackbar.LENGTH_LONG)
                Log.e("ERROR","${t.message}")
            }
        }

        val nome = binding.txtNome.text.toString()
        val sobrenome = binding.txtSobrenome.text.toString()
        val dataNascimento = binding.txtDataNascimento.text.toString()
        val cpf = binding.txtCPF.text.toString()
        val telefone = binding.txtTelefone.text.toString()
        val celular = binding.txtTelefone.text.toString()

        var cliente = Cliente(nome, sobrenome, dataNascimento, cpf, telefone, celular);
        API().cliente.cadastrar("Bearer ${Sessao.usuario?.token}",cliente).enqueue(callback)
    }

    fun cancelarCadastro(){
        //Limpar usuairo da sessao aqui
        Utilitarios.abrirTela(this, LoginActivity::class.java)
        finish()
    }

    fun validarFormulario(): Boolean {
        if (binding.txtNome.text.isNullOrEmpty()) {
            binding.txtNomeLayout.error = "Digite o Nome"
            binding.txtNome.requestFocus()
            return false
        }
        else if (binding.txtSobrenome.text.isNullOrEmpty()) {
            binding.txtSobrenomeLayout.error = "Digite o Sobrenome"
            binding.txtSobrenome.requestFocus()
            return false
        }
        else if (binding.txtDataNascimento.text.isNullOrEmpty()) {
            binding.txtDataNascimentoLayout.error = "Digite a data de nascimento"
            binding.txtDataNascimento.requestFocus()
            return false
        }
        else if (binding.txtCPF.text.isNullOrEmpty() || binding.txtCPF.text.toString().length < 11) {
            binding.txtCPFLayout.error = "Digite um CPF valido"
            binding.txtCPF.requestFocus()
            return false
        }
        else if (binding.txtTelefone.text.isNullOrEmpty() ||  binding.txtTelefone.text.toString().length < 10) {
            binding.txtTelefoneLayout.error = "Digite um Telefone valido"
            binding.txtTelefone.requestFocus()
            return false
        }
        else if (binding.txtCelular.text.isNullOrEmpty() ||  binding.txtCelular.text.toString().length < 11) {
            binding.txtCelularLayout.error = "Digite um Celular valido"
            binding.txtCelular.requestFocus()
            return false
        }
        else {
            return true
        }
    }
}