package com.teyvat.genshop

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.os.CountDownTimer
import android.view.Window
import androidx.appcompat.app.AppCompatDelegate
import com.teyvat.genshop.menu.MenuActivity
import com.teyvat.genshop.utils.Utilitarios

class MainActivity : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        AppCompatDelegate.setDefaultNightMode(AppCompatDelegate.MODE_NIGHT_NO)
        delegate.applyDayNight()
        setContentView(R.layout.activity_main)

        supportActionBar?.hide()


        val timer = object: CountDownTimer(3000, 1000) {
            override fun onTick(millisUntilFinished: Long) {

            }

            override fun onFinish() {
                Utilitarios.abrirTela(this@MainActivity, MenuActivity::class.java)
            }
        }
        timer.start()
    }
}