package com.teyvat.genshop.menu

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
import android.view.MenuItem
import android.widget.Toast
import androidx.appcompat.app.ActionBarDrawerToggle
import androidx.drawerlayout.widget.DrawerLayout
import com.teyvat.genshop.R
import com.teyvat.genshop.databinding.ActivityMenuBinding
import androidx.fragment.app.Fragment
import com.google.android.material.navigation.NavigationView
import com.google.android.material.snackbar.Snackbar
import com.teyvat.genshop.LoginActivity
import com.teyvat.genshop.menu.configuracoes.DadosFragment
import com.teyvat.genshop.menu.configuracoes.EnderecosFragment
import com.teyvat.genshop.menu.configuracoes.SuporteFragment
import com.teyvat.genshop.menu.pesquisa.FavoritosFragment
import com.teyvat.genshop.menu.pesquisa.PedidosFragment
import com.teyvat.genshop.menu.pesquisa.PesquisaFragment
import com.teyvat.genshop.models.Cliente
import com.teyvat.genshop.utils.Sessao
import com.teyvat.genshop.utils.Utilitarios

class MenuActivity : AppCompatActivity() {
    lateinit var binding: ActivityMenuBinding
    lateinit var toggle: ActionBarDrawerToggle

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityMenuBinding.inflate(layoutInflater)
        setContentView(binding.root)

        //#region Configuração inicial do menu
        supportActionBar?.setDisplayHomeAsUpEnabled(true)
        toggle = ActionBarDrawerToggle(this, binding.drawerLayout, R.string.abrir_menu, R.string.fechar_menu)
        binding.drawerLayout.addDrawerListener(toggle)
        toggle.syncState()
        gerarBotoes()
        configurarMenu();
        //#endregion


    }

    override fun onOptionsItemSelected(item: MenuItem): Boolean {
        return toggle.onOptionsItemSelected(item)
    }

    override fun onResume() {
        configurarMenu()
        super.onResume()
    }

    fun verificaUsuarioLogado(): Boolean{
        return Sessao.token != ""
    }

    fun configurarMenu(){
        Log.d("Logado:", verificaUsuarioLogado().toString())
        if(verificaUsuarioLogado()){
            Utilitarios.snackBar(binding.root, "Bem-vindo ${Sessao.cliente.nome} - Token: ${Sessao.token}}", Snackbar.LENGTH_LONG)
            binding.navigationView.menu.findItem(R.id.entrar).setVisible(false)

            binding.navigationView.menu.findItem(R.id.favoritos).setVisible(true)
            binding.navigationView.menu.findItem(R.id.pedidos).setVisible(true)
            binding.navigationView.menu.findItem(R.id.dados).setVisible(true)
            binding.navigationView.menu.findItem(R.id.enderecos).setVisible(true)
            binding.navigationView.menu.findItem(R.id.sair).setVisible(true)
        }
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
                    Sessao.cliente = Cliente("","")
                    Sessao.token = ""
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