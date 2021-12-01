package com.teyvat.genshop.menu

import android.content.Context
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
import android.view.Menu
import android.view.MenuItem
import androidx.appcompat.app.ActionBarDrawerToggle
import androidx.preference.PreferenceManager
import com.teyvat.genshop.R
import com.teyvat.genshop.databinding.ActivityMenuBinding
import com.google.android.material.snackbar.Snackbar
import com.teyvat.genshop.LoginActivity
import com.teyvat.genshop.api.API
import com.teyvat.genshop.menu.configuracoes.*
import com.teyvat.genshop.menu.pesquisa.FavoritosFragment
import com.teyvat.genshop.menu.pesquisa.PedidosFragment
import com.teyvat.genshop.menu.pesquisa.PesquisaFragment
import com.teyvat.genshop.menu.pesquisa.PesquisaLojaFragment
import com.teyvat.genshop.models.Cliente
import com.teyvat.genshop.models.Endereco
import com.teyvat.genshop.models.Loja
import com.teyvat.genshop.models.Usuario
import com.teyvat.genshop.utils.Sessao
import com.teyvat.genshop.utils.Utilitarios
import com.teyvat.genshop.utils.UtilitariosAPI
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class MenuActivity : AppCompatActivity() {
    lateinit var binding: ActivityMenuBinding
    lateinit var toggle: ActionBarDrawerToggle

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityMenuBinding.inflate(layoutInflater)
        Utilitarios.aplicarTema(this, delegate)
        setContentView(binding.root)

        //#region Configuração inicial do menu
        supportActionBar?.setDisplayHomeAsUpEnabled(true)
        toggle = ActionBarDrawerToggle(this, binding.drawerLayout, R.string.abrir_menu, R.string.fechar_menu)
        binding.drawerLayout.addDrawerListener(toggle)
        toggle.syncState()
        gerarBotoes()
        configurarMenu();
        //#endregion
        delegate

    }

    override fun onResume() {
        configurarMenu()
        super.onResume()
    }

    override fun onOptionsItemSelected(item: MenuItem): Boolean {
        when(item.itemId){
            R.id.config -> {
                supportFragmentManager
                    .beginTransaction()
                    .replace(R.id.menuContainer, ConfiguracoesFragment())
                    .commit()
                return super.onOptionsItemSelected(item)
            }
        }

        return toggle.onOptionsItemSelected(item)
    }

    override fun onCreateOptionsMenu(menu: Menu?): Boolean {
        menuInflater.inflate(R.menu.menu_configuracoes, menu)
        return super.onCreateOptionsMenu(menu)
    }

    fun verificaUsuarioLogado(): Boolean{
        val auto = PreferenceManager.getDefaultSharedPreferences(this).getBoolean("auto_login", true)

        //Caso auto login esteja ligado
        if(auto){
            val usuarioPref = getSharedPreferences("UsuarioInfo", Context.MODE_PRIVATE)
            val usuario = usuarioPref.getString("nome", null)
            val token = usuarioPref.getString("token", null)
            val email = usuarioPref.getString("email", null)

            if(usuario != null && token != null && email != null){
                Sessao.usuario = Usuario(usuario,email,token)

                if(Sessao.cliente == null && Sessao.endereco == null){
                    UtilitariosAPI.logarComToken(binding.root)
                }
            }
        }

        return Sessao.usuario != null
    }

    fun logarComToken(){
        //#region Endereço
        val callbackEndereco = object : Callback<Endereco> {
            override fun onResponse(call: Call<Endereco>, response: Response<Endereco>) {
                if(response.isSuccessful) {
                    Sessao.endereco = response.body()
                    Log.d("Cliente", Sessao.cliente!!.id.toString())
                    Log.d("Endereço", Sessao.endereco!!.id.toString())
                }
                else {
                    val error = response.errorBody().toString()
                    Utilitarios.snackBar(binding.root, error, Snackbar.LENGTH_LONG)
                }
            }
            override fun onFailure(call: Call<Endereco>, t: Throwable) {
                Utilitarios.snackBar(binding.root, "Falha ao conectar com o servidor. ${t.message}", Snackbar.LENGTH_LONG)
                Log.e("ERROR","${t.message}")
            }
        }
        //#endregion

        //#region Cliente
        val callbackCliente = object : Callback<Cliente> {
            override fun onResponse(call: Call<Cliente>, response: Response<Cliente>) {
                if(response.isSuccessful) {
                    Sessao.cliente = response.body()
                    Utilitarios.snackBar(binding.root, "Bem-vindo ${Sessao.cliente!!.first_name}", Snackbar.LENGTH_LONG)
                    API().endereco.listarPrincipal("Bearer ${Sessao.usuario?.token}").enqueue(callbackEndereco)
                }
                else {
                    val error = response.errorBody().toString()
                    Utilitarios.snackBar(binding.root, error, Snackbar.LENGTH_LONG)
                }
            }
            override fun onFailure(call: Call<Cliente>, t: Throwable) {
                Utilitarios.snackBar(binding.root, "Falha ao conectar com o servidor. ${t.message}", Snackbar.LENGTH_LONG)
                Log.e("ERROR","${t.message}")
            }
        }

        //#endregion

        //#region Usuario
        val callbackUsuario = object : Callback<Usuario> {
            override fun onResponse(call: Call<Usuario>, response: Response<Usuario>) {
                if(response.isSuccessful) {
                    val usuario = response.body()
                    Sessao.usuario!!.name = usuario!!.name
                    Sessao.usuario!!.email = usuario!!.email
                    Log.d("Token", Sessao.usuario!!.token)
                    API().cliente.listar("Bearer ${Sessao.usuario?.token}").enqueue(callbackCliente)
                }
                else {
                    val error = response.errorBody().toString()
                    Utilitarios.snackBar(binding.root, error, Snackbar.LENGTH_LONG)
                }
            }
            override fun onFailure(call: Call<Usuario>, t: Throwable) {
                Utilitarios.snackBar(binding.root, "Falha ao conectar com o servidor. ${t.message}", Snackbar.LENGTH_LONG)
                Log.e("ERROR","${t.message}")
            }
        }
        API().usuario.logarToken("Bearer ${Sessao.usuario?.token}").enqueue(callbackUsuario)
        //#endregion
    }

    fun configurarMenu(){
        if(verificaUsuarioLogado()){
            binding.navigationView.menu.findItem(R.id.entrar).setVisible(false)

            binding.navigationView.menu.findItem(R.id.favoritos).setVisible(true)
            binding.navigationView.menu.findItem(R.id.pedidos).setVisible(true)
            binding.navigationView.menu.findItem(R.id.dados).setVisible(true)
            binding.navigationView.menu.findItem(R.id.enderecos).setVisible(true)
            binding.navigationView.menu.findItem(R.id.sair).setVisible(true)
        }
        //Caso nao esteja logado
        else {
            binding.navigationView.menu.findItem(R.id.entrar).setVisible(true)

            binding.navigationView.menu.findItem(R.id.favoritos).setVisible(false)
            binding.navigationView.menu.findItem(R.id.pedidos).setVisible(false)
            binding.navigationView.menu.findItem(R.id.dados).setVisible(false)
            binding.navigationView.menu.findItem(R.id.enderecos).setVisible(false)
            binding.navigationView.menu.findItem(R.id.sair).setVisible(false)
        }
    }

    fun gerarBotoes(){
        binding.navigationView.setNavigationItemSelectedListener() {
            binding.drawerLayout.closeDrawers()
            when(it.itemId ) {
                R.id.produtos -> {
                    var frag = PesquisaFragment.newInstance()
                    supportFragmentManager.beginTransaction().replace(R.id.menuContainer, frag).commit()
                }
                R.id.carrinho -> {
                    var frag = CarrinhoFragment.newInstance()
                    supportFragmentManager.beginTransaction().replace(R.id.menuContainer, frag).commit()
                }
                R.id.lojas -> {
                    var frag = PesquisaLojaFragment.newInstance()
                    supportFragmentManager.beginTransaction().replace(R.id.menuContainer, frag).commit()
                }
                R.id.favoritos -> {
                    var frag = FavoritosFragment.newInstance()
                    supportFragmentManager.beginTransaction().replace(R.id.menuContainer, frag).commit()
                }
                R.id.pedidos -> {
                    var frag = PedidosFragment.newInstance()
                    supportFragmentManager.beginTransaction().replace(R.id.menuContainer, frag).commit()
                }
                R.id.dados -> {
                    var frag = DadosFragment.newInstance()
                    supportFragmentManager.beginTransaction().replace(R.id.menuContainer, frag).commit()
                }
                R.id.enderecos -> {
                    var frag = EnderecosFragment.newInstance()
                    supportFragmentManager.beginTransaction().replace(R.id.menuContainer, frag).commit()
                }
                R.id.suporte -> {
                    var frag = SuporteFragment.newInstance()
                    supportFragmentManager.beginTransaction().replace(R.id.menuContainer, frag).commit()
                }
                R.id.sair -> {
                    Sessao.usuario = null
                    Utilitarios.abrirTela(this, LoginActivity::class.java)
                }
                R.id.entrar -> {
                    Utilitarios.abrirTela(this, LoginActivity::class.java)
                }
            }
            true
        }
    }

}