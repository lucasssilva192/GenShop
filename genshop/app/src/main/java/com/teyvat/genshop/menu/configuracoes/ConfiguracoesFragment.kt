package com.teyvat.genshop.menu.configuracoes

import android.content.Intent
import android.os.Bundle
import androidx.preference.PreferenceFragmentCompat
import androidx.preference.PreferenceManager
import com.teyvat.genshop.R
import com.teyvat.genshop.menu.MenuActivity
import com.teyvat.genshop.utils.Utilitarios

class ConfiguracoesFragment : PreferenceFragmentCompat() {
    var temaAtual: String? = null

    override fun onCreatePreferences(savedInstanceState: Bundle?, rootKey: String?) {
        setPreferencesFromResource(R.xml.root_preferences, rootKey)
        temaAtual = PreferenceManager.getDefaultSharedPreferences(context).getString("tema_selecionado", "Default")
    }

    override fun onDestroy() {
        var temaNovo = PreferenceManager.getDefaultSharedPreferences(context).getString("tema_selecionado", "Default")
        if( !temaAtual!!.contains(temaNovo.toString()) ){
            requireActivity().run{
                startActivity(Intent(this, MenuActivity::class.java))
                activity?.finish()
            }
        }
        super.onDestroy()
    }

}