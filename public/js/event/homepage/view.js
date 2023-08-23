// section2 角色職業資料
// var char_Array = [
//     `潛行暗殺者,善隱忍,精伏擊。本身擁有超強的近身戰鬥實力,伺機而動,常以風馳電掣的手段予敵致命一擊。事了拂衣而去,行蹤莫測難辨。<br>
//     使用雙刃。近戰法系輸出，擁有隱身技能的絕影峰十分適合作為團隊中偵查兵的存在，高爆發的技能保證其單體傷害。`,
//     `法力無邊，佛法精深。可將佛力凝聚肉體，形成萬帳金光的法像金身，擁有無窮無盡的神力來退魔伏妖。<br>
//     使用槍。近戰物理輸出職業，單體輸出較高，控制技能較多。`,
//     `天生具有皇者霸氣，是與生俱來的強者。每次逢敵都是以命養戰，鬼神見之都要避讓。一但開戰，必定至死方休。<br>
//     使用雙斧。近戰物理職業，擁有卓越的絕地反殺能力，是戰場上不可多得的戰鬥主力。`,
//     `神脈正統，天器傳人，善借五行之力，幻化出無形劍式，配合靈動的身法，給予敵人致命打擊。
//     <br>使用劍。遠程法系輸出，可以控制大量敵人，並給予傷害，但是血防較為薄弱，容易被集火擊殺。`,

//     `善觀星卜卦，奇門遁甲。常肩負長弓行走世間，以三尺玄羽懲惡揚善。在戰場上無論是拒敵還是追殺，都有著絕對的掌控權。
//     <br>使用弓。遠程物理輸出。靈巧的身形可以躲避近戰的攻擊，遠距離的射程可以將敵人逐一擊殺。`,
//     `悲天憫人者，以普渡蒼生為己念。善使琴音震撼軍心，精用仙法救死扶傷。通過各種輔助能力，助戰友立於不敗之地。
//     <br>使用琴。治癒+控制系職業，不僅可以實現輸出的作用，也可以扮演團隊治療的角色。`,
//     `嫉惡如仇，心存大是非。視軍令如山，在戰場上抵禦千軍，斬妖除魔。配合無所畏懼的決心，對敵人造成心靈與肉體的雙重傷害。
//     <br>使用重劍。近戰物理職業，當之無愧的坦克職業，擁有強大的防禦力和生存能力，是團隊中不可缺少的存在。`,
//     `擁有超凡的自癒能力，能善用丹藥賜予萬玉頃刻恢復生機之能，自保能力強，在戰爭中充當著治癒者的身份。
//     <br>使用法仗。治癒系職業，無論是副本還是戰鬥都不可或缺的職業之一，有了該職業相當於多了一條命。`,

// ]



// 絕影峰
var char_Array1 = [
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill4_1.png">`,
        title: `影殺`,
        text:'快速揮動雙刃對目標發起攻擊，同時使你獲得一層滅魂印記，持續9秒，該狀態最多可疊加至5層'
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill4_2.png">`,
        title: `滅魂殺`,
        text:'吞噬自身的滅魂印記，對其造成致命一擊。根據吞噬滅魂印記的層數，提升本次滅魂殺的傷害： 一層：傷害提升50% 二層：傷害提升120% 三層：傷害提升210% 四層：傷害提升320% 五層：傷害提升450%'
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill4_3.png">`,
        title: `噬魂殺`,
        text:'對目標發起充斥殺意的一擊，同時使目標陷入封印狀態，無法使用技能，持續1秒'
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill4_4.png">`,
        title: `隱遁`,
        text:'進入隱匿狀態，不會被他人發現。移動速度降低25%，使用技能、受到傷害或造成傷害均會解除隱匿狀態。該技能在戰鬥中無法使用，解除隱匿狀態後20秒之內不得再次施展此技能'
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill4_5.png">`,
        title: `修羅怒`,
        text:'永久增加30點智力'
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill4_6.png">`,
        title: `影襲`,
        text:'使目標陷入麻痺狀態，無法移動和使用技能，持續1.5秒。隱匿狀態下發動此技能麻痺時間翻倍'
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill4_7.png">`,
        title: `幻影突襲`,
        text:'化為幻影突襲目標，快速攻擊目標3次，攻擊結束後會停留在目標身邊'
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill4_8.png">`,
        title: `追魂印`,
        text:'瞬間對目標造成一次傷害並為自己施加3層滅魂印記'
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill4_9.png">`,
        title: `霧化`,
        text:'立即進入隱匿狀態，可以在戰鬥中使用'
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill4_10.png">`,
        title: `風華圓斬`,
        text:'揮動雙刃高速旋轉，每0.5秒釋放一次刀氣攻擊周身半徑16米範圍內最多8個敵人，持續2秒'
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill4_11.png">`,
        title: `修羅斬`,
        text:'躍至空中俯衝攻擊目標，修羅斬會吞噬自身的滅魂印記，並根據該狀態的層數提升本次修羅斬的傷害： 一層：傷害提升70% 二層：傷害提升140% 三層：傷害提升230% 四層：傷害提升350% 五層：傷害提升500%'
    },
];

// 天龍居		
var char_Array2 = [
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill2_1.png">`,
        title:'流火',
        text:'槍若流火，攻擊目標'
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill2_2.png">`,
        title:'龍槍',
        text:'投擲長槍攻擊遠處一名敵人，並使其流血，每秒損失一定生命值，持續10秒。龍槍命中目標有33%的機率使你在6秒內的下一次驚雷不消耗元氣'
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill2_3.png">`,
        title:'驚雷',
        text:'以驚雷之勢突擊一名目標，對攜帶龍槍流血狀態的目標造成的傷害提高100%'
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill2_4.png">`,
        title:'碎星',
        text:'以碎星之勢攻擊目標'
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill2_5.png">`,
        title:'龍魂',
        text:'永久增加30點力量'
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill2_6.png">`,
        title:'龍舞',
        text:'以矯健的身法躍起攻擊目標，並使其失明，無法移動和釋放技能，持續3秒'
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill2_7.png">`,
        title:'龍威',
        text:'化身為真龍，以無上龍威持續攻擊目標，1.8秒內連續攻擊6次'
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill2_8.png">`,
        title:'龍鱗',
        text:'施法者在接下來4秒內所受到的傷害降低60%'
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill2_9.png">`,
        title:'龍炎',
        text:'召喚龍炎持續灼燒周身半徑12米範圍內的敵方目標，持續4秒'
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill2_10.png">`,
        title:'八荒',
        text:'對自身周圍18米範圍內最多8名敵人發起攻擊'
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill2_11.png">`,
        title:'龍怒',
        text:'怒火焚身，立即重置除龍怒外所有技能的冷卻時間，並且在接下來的8秒內造成的傷害提高20%'
    },
];

// 神荒岭
var char_Array3 = [
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill3_1.png">`,
        title: `致命投擲`,
        text: `蓄勢後向選中目標投擲一把飛斧，造成致命的打擊。飛斧有60%的機率對目標造成割裂效果，使其受到的傷害提高5%，並每秒損失一定生命值，持續5秒。`,
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill3_2.png">`,
        title: `斬殺`,
        text: `近身斬擊目標，對攜帶割裂效果的目標斬殺造成傷害有60%的機率使斬殺立即冷卻`,
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill3_3.png">`,
        title: `野蠻打擊`,
        text: `擲出飛斧攻擊目標，自身獲得30點元氣`,
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill3_4.png">`,
        title: `狂怒打擊`,
        text: `進入狂怒狀態，6秒內你的普攻有25%的機率造成3次傷害`,
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill3_5.png">`,
        title: `遠古之心`,
        text: `永久增加30點力量`,
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill3_6.png">`,
        title: `神行`,
        text: `召喚神力加持自身，6秒內移動速度提高3點`,
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill3_7.png">`,
        title: `破膽怒吼`,
        text: `向選中敵人怒吼，使其陷入恐懼狀態，無法進行任何操作，持續3秒`,
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill3_8.png">`,
        title: `蠻靈附體`,
        text: `化身為上古蠻靈，普通攻擊從劈砍變為投擲，射程提高至32米，並免疫定身和減速效果，持續8秒`,
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill3_9.png">`,
        title: `利刃切割`,
        text: `向指定地點投擲利斧，每0.5秒對半徑10米內最多8個敵人造成一次切割攻擊，並附加#點真實傷害，持續4秒`,
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill3_10.png">`,
        title: `野蠻跳躍`,
        text: `向選定目標跳躍，落地時震擊周身半徑8米範圍內最多8個敵人`,
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill3_11.png">`,
        title: `屹立不倒`,
        text: `開啟後免疫所有致死傷害，生命值將不會少於1點，持續6秒`,
    },
];

// 幻劍宗
var char_Array4 = [

    {icon: `<img src="/img/event/homepage/skill_icon/char_skill4_1.png">`,
    title:'炎爆彈',
    text:'吟唱施法後發射一枚炎爆彈攻擊目標'},
    {icon: `<img src="/img/event/homepage/skill_icon/char_skill4_2.png">`,
    title:'掌心雷',
    text:'發出一道雷電攻擊選中目標'},
    {icon: `<img src="/img/event/homepage/skill_icon/char_skill4_3.png">`,
    title:'玄冰彈',
    text:'將劍氣凝結成冰後攻擊目標，同時使目標陷入冰凍狀態，移動速度降低30%，持續4秒'},
    {icon: `<img src="/img/event/homepage/skill_icon/char_skill4_4.png">`,
    title:'三昧真火',
    text:'凝聚法力召喚三昧真火攻擊目標'},
    {icon: `<img src="/img/event/homepage/skill_icon/char_skill4_5.png">`,
    title:'劍心道體',
    text:'永久增加30點智力'},
    {icon: `<img src="/img/event/homepage/skill_icon/char_skill4_6.png">`,
    title:'雷遁術',
    text:'施展雷電之力將自身瞬間傳送至前方24米處，該技能不可穿越阻擋'},
    {icon: `<img src="/img/event/homepage/skill_icon/char_skill4_7.png">`,
    title:'轟雷術',
    text:'召喚一道天雷轟擊目標，並有機率使其進入麻痺狀態，無法移動和釋放技能，持續2秒'},
    {icon: `<img src="/img/event/homepage/skill_icon/char_skill4_8.png">`,
    title:'元力奔騰',
    text:'開啟後所有吟唱技能施法時間縮短30%並且每秒獲得7點元氣，持續5秒'},
    {icon: `<img src="/img/event/homepage/skill_icon/char_skill4_9.png">`,
    title:'紫電狂雷',
    text:'每0.5秒施放出一道雷電持續對半徑14米內最多8個目標發出雷擊，持續2秒'},
    {icon: `<img src="/img/event/homepage/skill_icon/char_skill4_10.png">`,
    title:'極度深寒',
    text:'召喚冰寒之力攻擊目標，同時使其被急凍，無法移動和使用技能，持續4秒。'},
    {icon: `<img src="/img/event/homepage/skill_icon/char_skill4_11.png">`,
    title:'冰棺術',
    text:'施法後立即進入冷凍狀態，但不清除已有的負面狀態，持續4秒'
    }
]

// 玄羽宮	
var char_Array5 = [
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill5_1.png">`,
        title:'蓄力射擊',
        text:'蓄力後對目標發起致命的一擊'
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill5_2.png">`,
        title:'穿透射擊',
        text:'射出一支穿透箭攻擊目標要害，技能命中目標有33%的機率觸發破綻效果，使目標在4秒內受到的傷害提升20%'
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill5_3.png">`,
        title:'元力射擊',
        text:'瞄准後射出一支箭攻擊目標，造成傷害可立即獲得15點元氣'
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill5_4.png">`,
        title:'沉默射擊',
        text:'快速射出一支箭矢攻擊目標，並使其封印，無法使用技能，持續2秒'
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill5_5.png">`,
        title:'心之羽',
        text:'永久增加30點力量'
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill5_6.png">`,
        title:'連珠箭',
        text:'1秒內快速射出5箭攻擊目標'
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill5_7.png">`,
        title:'閃避射擊',
        text:'快速射出一支箭矢攻擊面前的目標，同時自身向後方滑行20米'
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill5_8.png">`,
        title:'風行',
        text:'開啟風行狀態，能發現視野內的所有隱匿單位，移動速度增加4點，持續6秒'
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill5_9.png">`,
        title:'星天弓',
        text:'射出一簇箭枝攻擊選定半徑12米範圍內的最多8個目標'
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill5_10.png">`,
        title:'風遁術',
        text:'解除目標對你的鎖定並在原地留下一個幻影，自身移動到30米內的指定地點，幻影存在8秒，會伴隨你進行攻擊，傷害是你普攻傷害的60%，生命值為你的20%'
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill5_11.png">`,
        title:'殺戮射擊',
        text:'射出一支充斥殺意的箭枝攻擊目標，只能對生命值低於30%的目標施展；普通攻擊有8%的機率觸發該技能，每8秒只能觸發一次'
    },
];

// 妙音谷		
var char_Array6 = [
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill6_1.png">`,
        title:'音爆術',
        text:'彈奏爆裂之音對遠處的一名目標發動攻擊，有30%的機率對其施加6秒的殺伐之音效果，使其在遭到你和你的隊友攻擊時受到額外傷害'
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill6_2.png">`,
        title:'映月輝',
        text:'在指定區域內放置一處治療結界，每2秒為半徑14米內所有的友方目標恢復生命，每次額外恢復目標1%的生命值，結界最多存在6秒'
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill6_3.png">`,
        title:'月光咒',
        text:'召喚月光每秒對一名目標發動一次攻擊，持續4秒'
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill6_4.png">`,
        title:'音障',
        text:'為你或你的隊友施加一個護盾，該護盾可以吸收等於你生命值6%的傷害，持續6秒'
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill6_5.png">`,
        title:'萬妙神決',
        text:'永久增加30點智力'
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill6_6.png">`,
        title:'幻想之音',
        text:'吟唱後彈奏幻想之音，使一名目標陷入昏睡狀態，持續9秒，受到傷害會清醒'
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill6_7.png">`,
        title:'守護之靈',
        text:'使你或一名隊友在6秒內受到的傷害減少40%'
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill6_8.png">`,
        title:'恐懼之音',
        text:'使一名敵人陷入恐懼狀態，無法移動和使用技能，持續3秒'
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill6_9.png">`,
        title:'回音波',
        text:'對自身周圍14米範圍內最多8個敵人發起音波攻擊'
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill6_10.png">`,
        title:'鎮魂曲',
        text:'彈奏魔音震懾目標靈魂，使其進入呆滯狀態，無法移動和使用技能，持續6秒，期間持續受到傷害。如果對友方施展則會每秒為其恢復2%生命，恢復效果受妙音谷的法術攻擊和特傷加成，友方單位不會陷入呆滯狀態'
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill6_11.png">`,
        title:'希望之音',
        text:'使你和40米範圍內的隊友造成的傷害和治療提高20%，移動速度增加2點，持續15秒，希望之音效果結束時會給予攜帶者一個持續3分鐘的心滿意足狀態，攜帶該狀態的玩家無法獲得希望之音的效果'
    },
];

// 破軍府	
var char_Array7 = [
    {icon:`<img src="/img/event/homepage/skill_icon/char_skill7_1.png">`,
    title:`襲風斬`,
    text:`快速剛猛的斬擊撕裂氣流攻擊敵人`},
    {icon:`<img src="/img/event/homepage/skill_icon/char_skill7_2.png">`,
    title:`驚神斬`,
    text:`對目標造成充斥著殺意的一擊，並使目標陷入封印狀態，無法使用技能，持續1.5秒`},
    {icon:`<img src="/img/event/homepage/skill_icon/char_skill7_3.png">`,
    title:`迎風斬`,
    text:`向目標發起衝鋒，快速貼近目標後對其發起攻擊`},
    {icon:`<img src="/img/event/homepage/skill_icon/char_skill7_4.png">`,
    title:`裂骨打擊`,
    text:`揮動巨劍對目標造成一次強力的攻擊，並使其陷入僵硬狀態，移動速度降低30%，持續6秒`},
    {icon:`<img src="/img/event/homepage/skill_icon/char_skill7_5.png">`,
    title:`破力訣`,
    text:`永久增加30點力量`},
    {icon:`<img src="/img/event/homepage/skill_icon/char_skill7_6.png">`,
    title:`血月斬`,
    text:`對目標發動血月斬擊，同時讓其陷入流血狀態，每秒持續損失一定生命值，持續6秒`},
    {icon:`<img src="/img/event/homepage/skill_icon/char_skill7_7.png">`,
    title:`擒龍手`,
    text:`運用無上法力將選中的敵方目標拖拽至你的面前並使其定身1.5秒`},
    {icon:`<img src="/img/event/homepage/skill_icon/char_skill7_8.png">`,
    title:`極限血脈`,
    text:`立即增加並恢復自身生命值上限的12%，持續12秒`},
    {icon:`<img src="/img/event/homepage/skill_icon/char_skill7_9.png">`,
    title:`旋風斬`,
    text:`快速揮舞巨劍，攻擊半徑12米內最多8個敵人`},
    {icon:`<img src="/img/event/homepage/skill_icon/char_skill7_10.png">`,
    title:`巨刃風暴`,
    text:`揮舞巨刃快速旋轉，持續對周圍半徑12米內最多8個敵人發起攻擊，每0.4秒攻擊1次，持續4秒，可以移動施法`},
    {icon:`<img src="/img/event/homepage/skill_icon/char_skill7_11.png">`,
    title:`生命護甲`,
    text:`消耗生命值最大值的15%為自己施展一個可以吸收相當於消耗生命值120%傷害的護盾，持續15秒，生命值低於15%無法施法該技能`}
]

// 星羅天			
var char_Array8 = [
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill8_1.png">`,
        title: `星之火`,
        text:`引動星辰之火轟擊敵人`
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill8_2.png">`,
        title: `星之印`,
        text:`使用神聖之力回復自己或一名隊友的生命，並附帶治療效果；或對敵方目標發起神聖一擊`
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill8_3.png">`,
        title: `星之痕`,
        text:`為目標施加一個詛咒效果，每秒造成一次傷害，持續6秒`
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill8_4.png">`,
        title: `歸元訣`,
        text:`引動天地元氣為自己或一名友方目標恢復生命值`
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill8_5.png">`,
        title: `引星念`,
        text:`永久增加30智力`
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill8_6.png">`,
        title: `清蓮訣`,
        text:`為一名友方目標或自己施加一個治癒狀態，持續10秒，每2秒恢復一次生命值`
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill8_7.png">`,
        title: `星之耀`,
        text:`向半徑12米範圍內最多4個目標發起攻擊，並使其陷入失明狀態，持續2.5秒，失明狀態下失去自身控制`
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill8_8.png">`,
        title: `太清訣`,
        text:`持續施展太清訣，每2秒為自身周圍半徑12米範圍內所有友方目標治療一次，每次恢復其3%的生命值，持續4秒，恢復量受星羅天的攻擊加成影響`
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill8_9.png">`,
        title: `星之環`,
        text:`對自身周圍半徑12米以內的最多6個敵人造成1次傷害`
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill8_10.png">`,
        title: `須彌訣`,
        text:`施法後遁入須彌中，受到的傷害減少60%，可以移動但不能使用技能，且每受到一次傷害就會獲得一次治療，持續4秒`
    },
    {
        icon: `<img src="/img/event/homepage/skill_icon/char_skill8_11.png">`,
        title: `聖元訣`,
        text:`瞬間為自己或一名隊友目標恢復等同於自己生命上限35%的生命值，恢復量受自身攻擊加成，受到聖元訣影響的目標120秒之內無法再受到相同的效果影響`
    },
];







