var formLang = function (t) {
    function n(o) {
        if (r[o])return r[o].exports;
        var i = r[o] = {exports: {}, id: o, loaded: !1};
        return t[o].call(i.exports, i, i.exports, n), i.loaded = !0, i.exports
    }

    var r = {};
    return n.m = t, n.c = r, n.p = "", n(0)
}([function (t, n, r) {
    t.exports = r
}, function (t, n, r) {
    var o = r(2), i = "cn", a = navigator.language ? navigator.language : navigator.userLanguage;
    t.exports = {lang: o, CURRENT_LANG: i, NAVIGATOR_LANG: a}
}, function (t, n, r) {
    function o(t) {
        return t && t.__esModule ? t : {"default": t}
    }

    n.__esModule = !0;
    var i = Object.assign || function (t) {
            for (var n = 1; n < arguments.length; n++) {
                var r = arguments[n];
                for (var o in r)Object.prototype.hasOwnProperty.call(r, o) && (t[o] = r[o])
            }
            return t
        }, a = r(3), c = o(a), u = {
        cnamePrefix: "前缀",
        cnameFirst: "名",
        cnameMiddle: "中间名",
        cnameLast: "姓",
        cnameSuffix: "后缀",
        cnameNick: "昵称",
        gBtnConfirm: "确 定",
        gBtnCancel: "取 消",
        gCalendarTypeYMD: "年 - 月 - 日",
        gCalendarTypeYM: "年 - 月",
        gCalendarTypeMD: "月 - 日",
        gCalendarTypeY: "仅年",
        gCalendarTypeM: "仅月",
        gCalendarTypeD: "仅日",
        gCalendarChooseMonth: "选择月份",
        gCalendarChooseDate: "选择日期",
        gMonth: ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月"],
        gWeekDay: ["日", "一", "二", "三", "四", "五", "六"],
        gTimeUnit: ["时", "分", "秒"],
        errOnlyInWeChat: "请使用微信扫描二维码访问",
        errAccessPassword: "访问密码错误，请重新输入",
        errRequired: "请填写此项",
        errMultiRequired: "请完整填写此项",
        errRankRequired: "请进行完整的排序",
        errTabularRequired: "请完整填写此项",
        errDuplicateData: "填写内容与已有反馈重复",
        errDuplicateDataFunc: function (t) {
            return "'" + t.data + "' 与已有反馈重复"
        },
        errOptionInputRequiredFunc: function (t) {
            return "请填写选项 " + t.options + " 后输入框"
        },
        errOptionQuotaFullErrFunc: function (t) {
            return "选项 " + t.options + " 的配额已满"
        },
        errCommodityQuotaFullErrFunc: function (t) {
            return "商品 " + t.options + " 的购买数量超过了最大限额"
        },
        errCommodityAmountShortFunc: function (t) {
            return "选购商品总金额需不小于 " + t.num
        },
        errCommodityAmountOverFunc: function (t) {
            return "选购商品总金额需不大于 " + t.num
        },
        errCommodityQuantityShortFunc: function (t) {
            return "选购商品总数需不少于 " + t.num
        },
        errCommodityQuantityOverFunc: function (t) {
            return "选购商品总数需不多于 " + t.num
        },
        errNumberInteger: "请输入整数",
        errDecimalLength: "输入的数字小数位数超出限制",
        errPositiveNumber: "请输入非负数",
        errNumber: "请输入数字",
        errNumberRange: "输入的数字超出限制范围（-9007199254740991 ~ 9007199254740991）",
        errContentRegFunc: function (t) {
            return "请输入符合" + t.type + "格式的内容"
        },
        errContentReg: "请输入符合格式的内容",
        errCalendarData: "请输入合法的日期值",
        errCalendarType: "输入日期不符合格式要求",
        errCalendarValid: "选择的日期超出范围",
        errMobileRequired: "请先输入手机号",
        errMobileError: "请输入正确格式的手机号",
        errMobileVerificationLimit: "获取验证码过于频繁",
        errMobileExtResourceUnavailable: "外部资源或服务不可用，请稍候重试",
        errMobileAreaUnavailable: "暂不支持该地区的手机号",
        errMobileVCRequired: "请输入验证码",
        errMobileVCError: "请输入正确的验证码",
        errNoTokenShareImage: "无法分享尚未发布的表单",
        tAccessPassword: "请输入访问密码",
        tUneExitForm: "访问的对象不存在",
        tUneExitFormDescribe: "请检查链接地址是否正确",
        tUpdatingTitle: "正在进行系统升级",
        tUpdatingDescribe: "您所访问的表单正在升级，暂时无法访问。建议稍后重试。",
        tBannedForm: "已停止访问该表单",
        tBannedFormDescribe: "您所访问的表单被举报涉嫌违法，已被麦客封禁。",
        tFrozenForm: "已停止访问该表单",
        tFrozenFormDescribe: "您所访问的表单因内容违规，已被冻结；待修改后可恢复访问。",
        tUnPublishForm: "表单未发布",
        tUnPublishFormDescribe: "表单暂未发布，请先发布表单。",
        tPauseForm: "该表单正在被编辑",
        tPauseFormDescribe: "您所访问的表单正在被所有者编辑，暂时无法访问。建议稍后重试。",
        tStoppedForm: "您所访问的表单已停止收集",
        tWrongDNSTitle: "表单不在本地区",
        tWrongSLDTitle: "抱歉，您所访问的表单与所属域名不匹配",
        tWrongSLDDescribe: "你可以尝试访问以下域名的表单链接",
        tNotNewestForm: "在您填写表单期间，制作人对它进行了修改，请刷新后重新提交。",
        tNotNewestFormDescribe: "已填写的内容会自动填充，所以刷新不会导致数据丢失。",
        tFormRefresh: "刷新表单",
        tLimitedTitle: "访问资源紧张",
        tLimitedSubTitle: "制表人未开启“表单访问加速”扩展包",
        tLimitedDescribe: "相较其他表单而言，开启了“表单访问加速”扩展包的表单将获得优先展示和提交的权利，无论资源是否紧张，您都可以顺利填写并提交。除优先权外，此扩展包还为表单提供了额外的网络资源，使表单内的图片秒速加载。",
        tLimitedGuide: "如果您不是制表人，建议您将情况反馈给制表人。",
        tLimitedGuideBuy: function (t) {
            return ["或者 ", c["default"].createElement("span", i({}, t.buyLink, {key: "np0"}), "购买专属访问资源"), " 开启当日访问通道。"]
        },
        tLimitedGuideUser: "如果您是制表人，请点击下面的按钮开启“表单访问加速”扩展包：",
        tLimitedOpen: "立即开启",
        tCDNTitle: "表单访问加速",
        tCDNOneDayBtn: "购买专属访问资源",
        tCDNOneDayPrice: "仅 ¥ 8.00",
        tCDNOneDayDes: ["购买后，您将在24小时之内获得专属访问资源，", "无论资源是否紧张，都能保障您顺利填写并提交当前表单。"],
        tGoToPay: "前往支付",
        tSupportPayMode: ["支付宝", "微信", "银联"],
        tFormProtect: "表单异常保护",
        tFormProtectDescribe: "该表单正收到大量异常数据提交，已进入表单异常保护模式。",
        tFormProtectGuide: function (t) {
            return ["异常数据通常来源于机器刷票或是大量恶意的访问行为，为防止此种情况的发生，请设置开启“", c["default"].createElement("span", i({}, t.authCode, {key: "np0"}), "表单验证码"), "”。"]
        },
        tIPLimited: "提交失败，您的IP可能存在异常",
        tIPLimitedDescribe: "系统检测到当前IP存在大量异常提交行为，如果您是正常使用，请点击下方按钮将此异常告知我们。",
        tIPLimitedDescribeMobile: "系统检测到当前IP存在大量异常提交行为，请断开 Wi-Fi、切换到移动网络进行重试。如果表单仍无法提交，请点击下方按钮将此异常告知我们。",
        tIPLimitedSubmit: "提交异常信息",
        tTitleViewMore: "了解更多",
        tSubmitErrorTitle: "提交失败",
        tSubmitErrorDescribe: "您所访问的表单存在数据异常，请联系制作人",
        tStartCountdown: "距离开放时间还有",
        tCountdownTimerFunc: function (t) {
            return "" + t.hour + " 小时 " + t.minutes + " 分钟 " + t.seconds + " 秒"
        },
        tStartHint: "开始收集表单时间为",
        tCollectionNotStarted: "您所访问的表单尚未开放",
        tCollectionFinished: "您所访问的表单收集已结束",
        tFormView: "查看原表单",
        tFormViewTIps: "查看模式下不能提交",
        tCollectionPeriod: "每日开放时间",
        tCollectionFull: "您所访问的表单收集已满额",
        tAlreadySubmitted: "您已经提交过该表单",
        tSubmittedToday: "您今天已经提交过该表单",
        fCaptchaTips: "请输入图中的字符，不区分大小写",
        fCaptchaChangeTips: "看不清？换一张",
        sShareBtnTitle: "通过二维码分享此表单",
        sShareFormDis: "扫描二维码，分享给好友",
        asSubmitSucceed: "提交成功！",
        asSubmitSucceedDescribe: "我们已收到您的反馈，感谢填写",
        asRandomCode: "随机码",
        asFeedbackNumber: "已收到 N 份反馈",
        asStatisticsView: "查看统计",
        asFormSubmitView: "查看数据",
        asFormSubmitScoreRight: "正确",
        asFormSubmitScoreWrong: "错误",
        asFormSubmitScoreAccuracy: "正确率",
        gConfirm: "确定",
        gGoBack: "返回",
        gWeChatSetHeadlineDefault: "我分享了一张表单",
        gPageCurrent: function (t) {
            return "第 " + t.num + " 页"
        },
        gPageAll: function (t) {
            return "共 " + t.num + " 页"
        },
        gPageCurrentAndAll: function (t) {
            return "第 " + t.current + " 页，共 " + t.total + " 页"
        },
        gPrev: "上一页",
        gNext: "下一页",
        gSubmit: "提交",
        gSaving: "提交中...",
        gPoweredBy: "由麦客提供技术支持",
        gPoweredByWithCompanyFunc: function (t) {
            return "由麦客为" + t.company + "提供技术支持"
        },
        cFileSupportFunc: function (t) {
            return "支持 " + t.fileTypes
        },
        cFileSizeHint: function (t) {
            return "上传文件（需小于" + t.fileSize + "M）"
        },
        cReUpload: "重新上传",
        cRemoveFile: "删除",
        cWxAuth: "获取信息",
        cRefreshWxAuth: "重新获取",
        cQuotaRemainingFunc: function (t) {
            return "剩余 " + t.remaining
        },
        cQuotaRemainingFull: "配额已满",
        cOptionDefaultTip: "请选择",
        cOptionLoading: "载入中...",
        cOptionOtherDefault: "其他",
        cInputWordLimitFormFunc: function (t) {
            return "请输入" + t.num + "个字以上"
        },
        cMultiInputInsert: "添加一项",
        cMultiInputRemove: "删除该项",
        cSelectorPlaceholder: "请选择",
        cOptionNull: "所有选项均已满额",
        cOptionsLimitEqualFunc: function (t) {
            return "请选择 " + t.num + " 项"
        },
        cOptionsLimitRangeFunc: function (t) {
            return "请选择 " + t.numForm + "~" + t.numTo + " 项"
        },
        cOptionsMoreThanNumFunc: function (t) {
            return "请至少选择 " + t.numForm + " 项"
        },
        cOptionsLessThanNumFunc: function (t) {
            return "请选择不多于 " + t.numTo + " 项"
        },
        cNumber: "数字",
        cPositiveNumber: "正数",
        cInteger: "整数",
        cPositiveInteger: "正整数",
        cNumberInputHintFunc: function (t) {
            return "请输入 " + t.numType
        },
        cNumberValueRangeHintFunc: function (t) {
            return "请输入 " + t.numRangeFrom + " ～ " + t.numRangeTo + " 的数字"
        },
        cNumberValueMoreThanValueFunc: function (t) {
            return "请输入大于等于 " + t.numRangeFrom + " 的数字"
        },
        cNumberValueLessThanValueFunc: function (t) {
            return "请输入小于等于 " + t.numRangeTo + " 的数字"
        },
        cDateTimeHour: "时",
        cDateTimeMin: "分",
        cDateTimeSec: "秒",
        cFillingPlaceholder: "请填写",
        cRankTips: "请拖动右侧选项，放进左边的次序栏中",
        cRankTipsMobile: "请按照优先次序，依次点击选项进行排序",
        cCurrencySymbolArray: ["¥", "$", "€", "£", "JP¥", "A$", "C$", "Fr.", "HK$", "฿", "S$", "kr", "kr", "zł", "kr.", "₽", "Mex$", "₩", "R", "R$", "Rs.", "RM", "Kč", "Ft", "₪", "NZ$", "₱", "NT$"],
        cAddressPlaceholder: "请输入地址",
        cAddressDetailsPlaceholder: "详细地址",
        cAddressCodePlaceholder: "邮编",
        cMobileGetCode: "获取验证码",
        cMobileCodeInput: "请输入验证码",
        cMobileHasSendCode: function (t) {
            return "已发送(" + t.timer + "s)"
        },
        cMobileNoQuotaTips: "该手机号已通过验证",
        cMobileCodeSucceed: "验证通过",
        cCommodityRemainMaxTips: function (t) {
            return "剩余 " + t.remain + "，限购 " + t.max
        },
        cCommodityMaxTips: function (t) {
            return "限购 " + t.max
        },
        cCommodityPayTitle: "收银台",
        cCommodityNoPayTitle: "商品明细",
        cCommodityName: "商品名称",
        cCommodityQuantity: "数量",
        cCommoditySubTotal: "小计",
        cCommodityPayTotal: function (t) {
            return ["需支付 ", c["default"].createElement("span", i({}, t.priceClass, {key: "np0"}), "" + t.price)]
        },
        cCommodityNoPayTotal: function (t) {
            return ["总计 ", c["default"].createElement("span", i({}, t.priceClass, {key: "np0"}), "" + t.price)]
        },
        cPayOfflineTitle: "线下支付",
        cPayOfflineGuide: "表单已提交，请妥善保管订单信息",
        cPayKnowIt: "知道了",
        cPayOnlineTitle: "在线支付",
        cPayOnlineGuide: "表单已提交，请继续完成支付",
        cPayOrderNo: "订单号：",
        cPayNeedPay: "需支付：",
        cPayWebPay: "电脑支付",
        cPayGoToPay: "前往支付",
        cPayAliPayQrCode: "支付宝扫码支付",
        cPayWxPayQrCode: "请使用微信扫码支付，二维码有效期24小时",
        cPayChooseOtherMethod: "选择其他支付方式",
        cPayAlterOrder: "返回修改订单",
        cPayChooseOtherMethodOrAlterOrder: "修改订单或选择其他支付方式",
        cPaySucceedTips: "支付成功",
        cPaySucceedDes: function (t) {
            return ["感谢使用“麦客商户平台”，为保障交易顺利与资金安全，", c["default"].createElement("span", i({}, t.strong, {key: "np0"}), "请截屏或以其他方式保存以下联系方式"), "。若对交易产生疑问，欢迎联系我们，谢谢！"]
        },
        cPaySucceedDetermination: "作为市场营销与信息收集的领导品牌，麦客始终恪守国家法律法规与商业准则，竭尽全力保障您的数据与资金安全。",
        cPayMerchantNo: "商家订单号：",
        cPayTradeNo: "支付交易号：",
        cContactUs: "联系方式：",
        cPayFinish: "完成",
        gSupportPayMode: ["支付宝", "微信", "银联", "线下支付"],
        cPicAttachmentTips: function (t) {
            return "支持 jpg, png, gif, bmp, psd, tiff 等图片格式" + t.resolution
        },
        cPicAttachmentTipsWidth: function (t) {
            return "宽( " + t.value + " )"
        },
        cPicAttachmentTipsHeight: function (t) {
            return "高( " + t.value + " )"
        },
        cPicAttachmentAddTitle: "点击选择图片",
        cPicAttachmentAddTips: function (t) {
            return "（需小于" + t.max + "M）"
        },
        cPicAttachmentLoadingTitle: "正在上传",
        cPicAttachmentReload: "重新上传",
        cUploadFailedILLEGAL_SUFFIX: "请选择正确的文件",
        cUploadFailedILLEGAL_FILE_SIZE: function (t) {
            return "请上传小于 " + t.fileSize + "M 的文件"
        },
        cUploadFailedILLEGAL_FILE_RESOLUTION: "文件的分辨率超过了限制",
        cFoldText: "收起",
        cUnFoldText: "展开",
        cAuthCodeTips: "请输入右图中的字符，不区分大小写",
        cWechat: "微信",
        cQQ: "QQ",
        cWeibo: "微博",
        cSkype: "Skype",
        cFacebook: "Facebook",
        cTwitter: "Twitter",
        cLinkedIn: "LinkedIn",
        cGooglePlus: "Google+",
        cNote: "备注",
        cWhatsApp: "WhatsApp",
        cViber: "Viber",
        cLine: "LINE",
        cMessenger: "Messenger",
        cTelegram: "Telegram",
        cInstagram: "Instagram",
        ctcfTypeArray: ["单行文本型", "多行文本型", "数字型", "评分型", "货币型", "单选型", "多选型", "多级下拉型", "日期时间型", "联系人", "身份证", "车牌号"],
        rErrEncryption: "未公开反馈数据",
        rErrEncryptionDescribe: "您访问的表单没有开启公开反馈数据，请联系表单制作者。",
        rErrGraphEmpty: "没有可显示的统计图表",
        rToForm: "访问表单",
        rTypeArray: ["统计图表", "数据详情"],
        rSearchByKey: "搜索关键词",
        rDataTitleArray: ["序号", "提交时间"],
        rDataLoading: "载入中...",
        rDataSelectorOtherOption: "其他",
        rGraphPercent: "占比",
        rGraphNumber: "数量",
        rGraphShowAll: "显示全部",
        rGraphCollapse: "收起",
        rGraphNoData: "尚无数据",
        rGraphMinRate: "最低分",
        rGraphAvgRate: "平均分",
        rGraphMaxRate: "最高分",
        rGraphMinNumber: "最小值",
        rGraphMaxNumber: "最大值",
        rGraphTotalNumber: "累加",
        rGraphAvgNumber: "平均值",
        rStatisticsRankTitle: "名次",
        rStatisticsRankChosenNum: "入围次数",
        rGraphTotal: function (t) {
            return ["反馈数：", c["default"].createElement("span", i({}, t.totalClass, {key: "np0"}), "" + t.total)]
        },
        fComponentText: "文本框",
        fComponentSelectSingle: "单选",
        fComponentSelectMulti: "多选",
        fComponentDropDown: "下拉",
        fComponentMultiLevel: "多级下拉",
        fComponentDatetime: "日期时间",
        fComponentDate: "日期",
        fComponentTime: "时间",
        fComponentNumber: "数字",
        fComponentAttachment: "附件",
        fComponentRate: "评分",
        fComponentTabular: "矩阵",
        fComponentRank: "排序",
        fComponentCurrency: "货币",
        fComponentCity: "城市",
        fComponentCommodity: "商品",
        fComponentPicSelectSingle: "图片单选",
        fComponentPicSelectMulti: "图片多选",
        fComponentPicAttachment: "图片上传",
        fComponentStaticPic: "图片展示",
        fComponentStaticText: "文本描述",
        fComponentSeparator: "分割线",
        fComponentPaging: "分页",
        fComponentAuthCode: "验证码",
        fComponentStaticMap: "静态地图",
        fComponentStaticVideo: "静态视频",
        fComponentName: "姓名",
        fComponentAvatar: "头像",
        fComponentEmail: "邮箱",
        fComponentCompany: "公司",
        fComponentDepartment: "部门",
        fComponentPosition: "职位",
        fComponentMobile: "手机",
        fComponentWebsite: "网址",
        fComponentTitle: "称谓",
        fComponentGender: "性别",
        fComponentBirthDate: "生日",
        fComponentLocation: "所在地",
        fComponentAddress: "地址",
        fComponentTelephone: "座机",
        fComponentFax: "传真",
        fComponentNote: "备注",
        fComponentCategoryIMInfo: "即时通讯",
        fComponentWechat: "微信",
        fComponentQQ: "QQ",
        fComponentSkype: "Skype",
        fComponentWhatsApp: "WhatsApp",
        fComponentMessenger: "Messenger",
        fComponentViber: "Viber",
        fComponentLine: "LINE",
        fComponentTelegram: "Telegram",
        fComponentCategorySNS: "社交网络",
        fComponentWeibo: "微博",
        fComponentLinkedIn: "LinkedIn",
        fComponentTwitter: "Twitter",
        fComponentFacebook: "Facebook",
        fComponentInstagram: "Instagram",
        fComponentGooglePlus: "Google+",
        cBtnDefault: "了解详情",
        preClose: "关闭预览",
        preSwitchTitle: ["查看网页端显示样式", "查看移动端显示样式"],
        succeedTips: "提交成功",
        succeedJumpTips: function (t) {
            return "" + t.sec + "s后跳转至"
        },
        ticketValidationTitle: "入场券",
        ticketValidationGuide: "请截图保存凭证",
        ckiBtn: "签 到",
        ckiSubTitleDefault: "欢迎您出席本次活动",
        ckiSucceedTitle: "签到成功",
        ckiSucceedDes: "欢迎您~",
        ckiSucceedDesWithKey: function (t) {
            return "欢迎您，" + t.checkKey + "~"
        },
        ckiOpenCpTitle: "由于您未填写过报名表，请补充以下信息",
        ckiIncompleteTitle: "配置未完成",
        ckiIncompleteDes: "请设置用于进行签到验证的题目",
        ckiFailedTitle: "签到失败",
        ckiFailedDes: "您之前没有填写过报名表，活动主办方设置仅允许事先报名成功的用户进行签到。",
        ckiDeviceLimitedDes: "此设备已经进行过一次签到，活动主办方要求每台设备只能签到一次，请勿重复签到。",
        ckiAuthGuide: "为了方便您后续出席活动时，进行快速扫码签到，建议您在填表前，授权微信登录。",
        ckiAuthNo: "不需要",
        ckiAuthYse: "授权登录",
        ckiClosedTitle: "已关闭签到功能",
        ckiClosedSubTitle: "制表人未开启“签到”功能",
        ariaRequired: "必填",
        ariaOptionContentAdd: "选项内容补充：",
        ariaInputWordLimitToFunc: function (t) {
            return "请输入少于" + t.to + "个字."
        },
        ariaInputWordLimitFormFunc: function (t) {
            return "请输入" + t.from + "个字以上."
        },
        ariaInputWordRange: function (t) {
            return "请输入至少" + t.from + "个字，至多" + t.to + "个字."
        },
        ariaMultiLine: "支持输入换行的内容.",
        ariaNameStruct: "分段填写.",
        ariaAcceptMultiItem: "允许输入多个，以分号(;)进行分割.",
        ariaRankTips: "请按顺序点击候选项，对候选项进行排序",
        ariaRankTipsProcessed: function (t) {
            return "已排序，当前序号为" + t.num
        },
        ariaRankTipsWaiting: "待排序",
        ariaRankTipsFin: function (t) {
            return "已完成排序，当前排序为:" + t.order
        }
    };
    n["default"] = u, t.exports = n["default"]
}, function (t, n, r) {
    t.exports = r(4)(315)
}, function (t, n) {
    t.exports = commons
}]);