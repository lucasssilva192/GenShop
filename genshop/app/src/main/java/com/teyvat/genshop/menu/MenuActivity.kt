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
import com.teyvat.genshop.menu.configuracoes.*
import com.teyvat.genshop.menu.pesquisa.FavoritosFragment
import com.teyvat.genshop.menu.pesquisa.PedidosFragment
import com.teyvat.genshop.menu.pesquisa.PesquisaFragment
import com.teyvat.genshop.models.Usuario
import com.teyvat.genshop.utils.Sessao
import com.teyvat.genshop.utils.Utilitarios

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

            if(usuario != null && token != null && email != null)
                Sessao.usuario = Usuario(usuario,email,token)

            Log.d("Cliente", "${Sessao.cliente?.first_name} - ${Sessao.cliente?.cpf}")
            Log.d("Endereco", "${Sessao.endereco?.name} - ${Sessao.endereco?.address}")
        }

        return Sessao.usuario != null
    }

    fun configurarMenu(){
        if(verificaUsuarioLogado()){
            Utilitarios.snackBar(binding.root, "Bem-vindo ${Sessao.usuario!!.name} - Token: ${Sessao.usuario!!.token}}", Snackbar.LENGTH_LONG)
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
                R.id.pesquisa -> {
                    var frag = PesquisaFragment.newInstance()
                    supportFragmentManager.beginTransaction().replace(R.id.menuContainer, frag).commit()
                }
                R.id.produtos -> {
                    var frag = ListaProdutoFragment.newInstance()
                    supportFragmentManager.beginTransaction().replace(R.id.menuContainer, frag).commit()
                }
                R.id.lojas -> {
                    var frag = LojasFragment.newInstance()
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